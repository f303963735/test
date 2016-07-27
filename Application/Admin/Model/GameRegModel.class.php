<?php
/**
* author： panfeng
* email ：89688563@qq.com
* date ：2016年7月13日
* charset ： UTF-8
*/

namespace Admin\Model;
use Think\Model;

class GameRegModel extends Model{
    
    public function __construct(){
        
        parent::__construct('','tab_');
        
    }
    
    /**
     * 获取某个时间的登录情况
     * @param number $time
     * @param unknown $type 0-统计次数，1-统计时间
     * @return number
     * author panfeng
     * email 89688563@qq.com
     * date 2016年7月15日下午6:40:14
     */
    public function getData($time=0){

        $arr = sd($time,'fd',7);
        $start = $arr['start'];
        $end = $arr['end'];
        $w['reg_time'] = array('between',array($start,$end));
        $w['appid'] = getAppId();
        
        $user = $this->where($w)->select();
        
        $period = 24 * 3600;
        $periods = period($time, $period, 'fd', 7);
        
        foreach ($periods as $v){
            $temp[date('m-d',$v)] = 0;
            foreach ($user as $v1){
                if (isBetween($v1['reg_time'], $v, $v + $period)){
                    $temp[date('m-d',$v)] += 1;
                }
            }
        }
        return $temp;
    }
    
}