<?php
/**
* author： panfeng
* email ：89688563@qq.com
* date ：2016年7月14日
* charset ： UTF-8
*/
namespace Admin\Controller;

class GameController extends BaseController{
    
    public function add(){
        
        if (IS_POST) {
            
            $model = D('Game');
            
            if ($model->create() !== false){
                $res = $model->add();
            }
            
            if ($res){
                $this->success('添加成功',U('Index/index'));
            } else {
                $this->error('添加失败');
            }
            
        } else {
            $this->metaTitle = '添加游戏';
            $this->assign('uid',UID);
            $this->adminDisplay();
        }
        
    }
    
    
}