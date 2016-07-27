<?php
/**
* author： panfeng
* email ：89688563@qq.com
* date ：2016年7月13日
* charset ： UTF-8
*/

namespace Admin\Model;
use Think\Model;

class GameLoginModel extends Model{
    
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
    public function getData($time=0, $type=0){

        $arr = sd($time);
        $start = $arr['start'];
        $end = $arr['end'];
        $w['login_time'] = array('between',array($start,$end));
        $w['appid'] = getAppId();
        
        $user = $this->where($w)->select();
        
        $period = 2 * 3600;
        $periods = period($time,$period);
        
        foreach ($periods as $k=>$v){
            $temp[date('H:i',$v)] = 0;
            foreach ($user as $v1){
                if (isBetween($v1['login_time'], $v, $v + $period)){
                    if ($type == 1){
                        $temp[date('H:i',$v)] += $v1['duration'];
                    } else {
                        $temp[date('H:i',$v)] += 1;
                    }
                }
            }
        }
        return $temp;
    }
    
    
}