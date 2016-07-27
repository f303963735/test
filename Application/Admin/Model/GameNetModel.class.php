<?php
/**
* author： panfeng
* email ：89688563@qq.com
* date ：2016年7月14日
* charset ： UTF-8
*/

namespace Admin\Model;
use Think\Model;

class GameNetModel extends Model{
    
    public function __construct(){
        
        parent::__construct('','tab_');
        
    }
    
    public function getData(){
        
        $appid = getAppId();
        $w['appid'] = $appid;
        $net = $this->field('net')->where($w)->group('net')->select();
        
        if ($net){
            foreach ($net as $v){
                $where = array(
                    'appid'=>$appid,
                    'net'=>$v['net']
                );
                $temp[$v['net']] = $this->where($where)->count();
            }
            return $temp;
        } else {
            return '';
        }
    }
}