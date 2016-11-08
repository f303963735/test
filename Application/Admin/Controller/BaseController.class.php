<?php
/**
* author： panfeng
* email ：89688563@qq.com
* date ：2016年7月12日
* charset ： UTF-8
*/

namespace Admin\Controller;
use Think\Controller;

class BaseController extends Controller{
    
    var $sysTitle = 'TMDGAME游戏数据统计系统';
    var $pageSize = 10;
    var $metaTitle;
    
    public function __construct(){
        parent::__construct();
        $this->__init();
    }
    
    public function __init(){
        
        $this->setAppid();
        
        $this->isLogin();
    }
    
    public function setAppid(){
        
        $appid = I('get.appid');
        if ($appid){
            $_SESSION['appid'] = $appid;
        }
    }
    
    /**
     * 统计信息，sql执行
     * @param unknown $model
     * @param number $p
     * @param unknown $extend
     * author panfeng
     * email 89688563@qq.com
     * date 2016年7月20日下午3:16:40
     */
    public function listsBySql($model, $p = 0, $extend = array()){
        $model || $this->error('模型名标识必须！');
        $page = intval($p);
        $page = $page ? $page : 1; //默认显示第一页数据
        $page -- ;
        
        if (is_string($model)){
            $model = D($model);
        } elseif (is_object($model)){
            $model = $model;
        }
        
        // 查询的字段
        $fields = $extend['fields'] ? $extend['fields'] : '*';
        
        $tablename = $model->getTableName();
        
        $sql = "SELECT $fields FROM $tablename ";
        
        // 条件
        $w = $extend['where'];
        $w and $sql .= ' WHERE '.$w;
        
        // 分组
        $group = $extend['group'];
        $group and $sql .= ' GROUP BY '.$group;
        
        // 统计总数
        $count = $model->execute($sql);
        
        // 分页
        $row = $this->pageSize;
        $start = $page * $this->pageSize;
        $end = $start + $this->pageSize;
        $sql .= " LIMIT $start , $end";
        
        $data = $model->query($sql);
        
        //分页
        if($count > $row){
            $page = new \Think\Page($count, $row);
            $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
            $this->assign('_page', $page->show());
        }
        
        $this->assign('list', $data);
        $this->adminDisplay();
    }
    
    public function lists($model = null, $p = 0,$extend=array()){
        
        $model || $this->error('模型名标识必须！');
        $page = intval($p);
        $page = $page ? $page : 1; //默认显示第一页数据
        
        if (is_string($model)){
            $model = D($model);
        } elseif (is_object($model)){
            $model = $model;
        }
        
        // 查询的字段
        $fields = $extend['fields'];
        
        // 关键字搜索
        $map	=   empty($extend['where']) ? array() : $extend['where'];
        
        foreach ($extend['key'] as $k => $val) {
            if(isset($_REQUEST[$val])){
                $map[$val]  =   array('like','%'.$_GET[$val].'%');
                unset($_REQUEST[$val]);
            }
        }
        
        $row = $this->pageSize;
        
        
        // 查询 单表 or 联表
        
        $data = $model
        /* 查询指定字段，不指定则查询所有字段 */
        ->field(empty($fields) ? true : $fields)
        // 查询条件
        ->where($map)
        /* 默认通过id逆序排列 */
        ->order(empty($extend['order']) ? 'id desc' : $extend['order'])
        /* 数据分页 */
        ->page($page, $row)
        /* 执行查询 */
        ->select();
        
        /* 查询记录总数 */
        $count = $model->where($map)->count();
        
        //分页
        if($count > $row){
            $page = new \Think\Page($count, $row);
            $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
            $this->assign('_page', $page->show());
        }
        
        $this->assign('list', $data);
        $this->adminDisplay();
    }
    
    public function isLogin(){
        // 获取当前用户ID
        if(defined('UID')) return ;
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
    }
    
    public function adminDisplay($templateFile='',$charset='',$contentType='',$content='',$prefix=''){
        $this->assign('sys_title',$this->sysTitle);
        $this->assign('meta_title',$this->metaTitle);
        $this->assign('is_index',(CONTROLLER_NAME == 'Index' && ACTION_NAME == 'index'));
        $this->assign('url',CONTROLLER_NAME.'/'.ACTION_NAME);
        $this->display($templateFile,$charset,$contentType,$content,$prefix);
    }
    
    
}