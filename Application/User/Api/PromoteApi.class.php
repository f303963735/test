<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace User\Api;
use User\Api\Api;
use Admin\Model\PromoteModel;

class PromoteApi extends Api{
    /**
     * 构造方法，实例化操作模型
     */
    protected function _init(){
        $this->model = new PromoteModel(); //M('Promote','tab_');
    }

    public function checkAccount($account){
        return $this->model->checkAccount($account);
    }

    /**
     * 注册一个新用户
     * @param  string $username 用户名
     * @param  string $password 用户密码
     * @param  string $email    用户邮箱
     * @param  string $mobile   用户手机号码
     * @return integer          注册成功-用户信息，注册失败-错误编号
     */
    public function register($account,$password,$real_name,$email,$mobile_phone){
        return $this->model->register($account,$password,$real_name,$email,$mobile_phone);
    }

    /**
    *新增子推广员
    */
    public function increase(){
        $result = $this->model->increase();
        return $result;
    }

    /**
    *编辑子推广员
    */
    public function edit($type){
        return $this->model->edit($type);
    }

    /**
     * 用户登录认证
     * @param  string  $username 用户名
     * @param  string  $password 用户密码
     * @param  integer $type     用户名类型 （1-用户名，2-邮箱，3-手机，4-UID）
     * @return integer           登录成功-用户ID，登录失败-错误编号
     */
    public function login($username, $password){
        return $this->model->login($username, $password);
    }

    /**
     * 获取用户信息
     * @param  string  $uid         用户ID或用户名
     * @param  boolean $is_username 是否使用用户名查询
     * @return array                用户信息
     */
    public function info($uid, $is_username = false){
        return $this->model->info($uid, $is_username);
    }

    /**
     * 检测用户名
     * @param  string  $field  用户名
     * @return integer         错误编号
     */
    public function checkUsername($username){
        return $this->model->checkField($username, 1);
    }

    /**
     * 检测邮箱
     * @param  string  $email  邮箱
     * @return integer         错误编号
     */
    public function checkEmail($email){
        return $this->model->checkField($email, 2);
    }

    /**
     * 检测手机
     * @param  string  $mobile  手机
     * @return integer         错误编号
     */
    public function checkMobile($mobile){
        return $this->model->checkField($mobile, 3);
    }


    /**
     * 更新用户信息
     * @param int $uid 用户id
     * @return true 修改成功，false 修改失败
     * @author huajie <banhuajie@163.com>
     */
    public function updateInfo($data){
        $return = $this->model->updateInfo($data);
        return $return;
    }

    /**
     * 更新用户信息
     * @param int $uid 用户id
     * @return true 修改成功，false 修改失败
     * @author huajie <banhuajie@163.com>
     */
    public function admin_updateInfo($data){
        $return = $this->model->admin_updateInfo($data);
        return $return;
    }

}
