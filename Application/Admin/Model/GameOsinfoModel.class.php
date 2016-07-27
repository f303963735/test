<?php
/**
* author： panfeng
* email ：89688563@qq.com
* date ：2016年7月14日
* charset ： UTF-8
*/

namespace Admin\Model;
use Think\Model;

class GameOsinfoModel extends Model{
    
    public function __construct(){
        
        parent::__construct('','tab_');
        
    }
    
    public function getData($group){
    
        $appid = getAppId();
        $w['appid'] = $appid;
        $arrGroup = $this->field($group)->where($w)->group($group)->select();
    
        if ($arrGroup){
            foreach ($arrGroup as $v){
                $where = array(
                    'appid'=>$appid,
                    $group=>$v[$group]
                );
                $temp[$v[$group]] = $this->where($where)->count();
            }
            return $temp;
        } else {
            return '';
        }
    }
    
}