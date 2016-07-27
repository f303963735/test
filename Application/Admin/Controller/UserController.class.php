<?php
/**
 * author : panfeng
 * email : 89688563@qq.com
 * date : 2016-7-12
 * charset : UTF-8
 */

namespace Admin\Controller;

class UserController extends BaseController{
	
	/**
	 * 新增玩家
	 * author panfeng
	 * email 89688563@qq.com
	 * date 2016年7月20日上午10:00:55
	 */
	public function newer(){
	    
	    if (IS_POST){
	        $model = D('Game_reg');
	        $data = $model->getData();
	        foreach ($data as $k=>$v){
	            $key[] = $k;
	            $val[] = $v;
	        }
	        echo json_encode(array('status'=>1,'key'=>$key,'val'=>$val));die;
	    } else {
    	    $this->metaTitle = '新增玩家';
    		$this->adminDisplay();
	    }
	    
	}
	
	/**
	 * 充值记录
	 * author panfeng
	 * email 89688563@qq.com
	 * date 2016年7月20日上午10:01:04
	 */
	public function recharge(){
	    $this->metaTitle = '充值记录';
	    $model = D('Game_recharge');
	    
	    $w['appid'] = $_SESSION['appid'];
        $extend['where'] = $w;
        parent::lists($model,$_GET['p'],$extend);
	}
	
	/**
	 * 在线统计
	 * author panfeng
	 * email 89688563@qq.com
	 * date 2016年7月20日上午10:01:14
	 */
	public function ontime(){
	    if (IS_POST){
	        $time = I('post.day','','strtotime');
	        $model = D('Game_login');
	        $data = $model->getData($time, 1);
	        	
	        foreach ($data as $k=>$v){
	            $key[] = $k;
	            $val[] = ceil($v / 60);
	        }
	        echo json_encode(array('status'=>1,'key'=>$key,'val'=>$val));die;
	    } else {
	        $this->metaTitle = '在线时间';
	        $this->adminDisplay();
	    }
	}
	
	/**
	 * 在线人次
	 * author panfeng
	 * email 89688563@qq.com
	 * date 2016年7月20日上午10:01:24
	 */
	public function logincount(){
	    
	    if (IS_POST){
	        $time = I('post.day','','strtotime');
    	    $model = D('Game_login');
    	    $data = $model->getData($time);
    	    
    	    foreach ($data as $k=>$v){
    	        $key[] = $k;
    	        $val[] = $v;
    	    }
    	    echo json_encode(array('status'=>1,'key'=>$key,'val'=>$val));die;
	    } else {
	        $this->metaTitle = '在线人次';
    		$this->adminDisplay();
	    }
		
	}
	
}