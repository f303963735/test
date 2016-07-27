<?php
/**
* author： panfeng
* email ：89688563@qq.com
* date ：2016年7月14日
* charset ： UTF-8
*/

namespace Admin\Controller;

class DeviceController extends BaseController{
    
    /**
     * 硬件信息
     * author panfeng
     * email 89688563@qq.com
     * date 2016年7月20日上午11:27:48
     */
    public function hardware(){
        $this->metaTitle = '硬件信息';
        $model = D('Game_device');
        
        $appid = getAppId();
        $extend['where'] = $w;
        parent::lists($model,$_GET['p'],$extend);
    }
    
    /**
     * 网络信息
     * author panfeng
     * email 89688563@qq.com
     * date 2016年7月20日下午5:59:47
     */
    public function net(){
        
        if (IS_POST){
            
            $model = D('Game_net');
            $data = $model->getData();
            
            if ($data){
                foreach ($data as $k=>$v){
                    $temp[] = array(
                        'name'=>$k,
                        'y'=>floatval($v)
                    );
                }
                echo json_encode(array('status'=>1,'data'=>$temp));die;
            } else {
                echo json_encode(array('status'=>0));die;
            }
            
        } else {
            $this->metaTitle = '网络信息';
            $this->adminDisplay();
        }
        
    }
    
    /**
     * 系统信息
     * author panfeng
     * email 89688563@qq.com
     * date 2016年7月20日下午5:36:37
     */
    public function os(){
        
        if (IS_POST){
            $model = D('Game_osinfo');
            $data = $model->getData($_POST['group']);
            
            if ($data){
                foreach ($data as $k=>$v){
                    $temp[] = array(
                        'name'=>$k,
                        'y'=>floatval($v)
                    );
                }
                echo json_encode(array('status'=>1,'data'=>$temp));die;
            } else {
                echo json_encode(array('status'=>0));die;
            }
            
        } else {
            $this->metaTitle = '系统信息';
            $this->adminDisplay();
        }
    }
    
    /**
     * 应用信息
     * author panfeng
     * email 89688563@qq.com
     * date 2016年7月20日上午11:27:57
     */
    public function apps(){
        $this->metaTitle = '应用信息';
        $model = D('Game_apps');
        $appid = getAppId();
        
        $extend['fields'] = "appid,apps_name,apps_size,apps_version,count(apps_name) as count";
        $extend['where'] = "appid='$appid'";
        $extend['group'] = "apps_name";
        
        parent::listsBySql($model, $_GET['p'], $extend);
        
    }
    
}