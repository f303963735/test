<?php
namespace Admin\Controller;

class IndexController extends BaseController {
    
    public function index(){
        $this->metaTitle = '游戏列表';
        
        $w['cp_uid'] = UID;
        $model = D('Game');
        
        $extend = array(
            'where'=>$w,
            'fileds'=>'game_name,game_appid'
        );
        parent::lists($model,$_GET['p'],$extend);
    }
    
    public function info(){
    	
    	$id = I('id');
    	$this->adminDisplay();
    	
    }
    
    
}