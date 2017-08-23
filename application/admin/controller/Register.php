<?php
namespace app\admin\controller;

use think\Db;
use think\View;
use think\Input;
use think\Request;
use think\Controller;

class Register extends \think\Controller
{
	/**
     * [register 跳转注册页面]
     * @return [type] [description]
     */
    public function register()
    {
      return $this->fetch('register/index');
    }

    /**
     * [doregister 用户注册]
     * @return [status] [返回注册状态]
     */
    public function doregister()
    {
      $data = input("post.");//接到view传过来的值
      $password = $data["password"];
      $hash = password_hash($password, PASSWORD_DEFAULT);//给密码进行hash加密
      $data = [
            'username'  =>  $data["username"],
            'password'  =>  $hash, 
            'email'     =>  $data["email"]
      ];//指定插入的数据的字段
      Db::name('myuser')->insert($data);//插入一条数据
      //$userId = Db::name('myuser')->getLastInsID();//插入成功返回id
      if( Db::name('myuser')->getLastInsID() ){//如果插入id能返回,为true,跳转到登录页
        $this->success("操作成功",url('Admin/Admin/index'));
      }else{
        $this->error("操作失败",url('Admin/Register/register'));
      }
    }
}