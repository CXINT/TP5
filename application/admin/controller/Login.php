<?php
namespace app\admin\controller;

use think\Db;
use think\View;
use think\Input;
use think\Request;
use think\Controller;

class Login extends \think\Controller
{

	/**
     * [login 跳转登录页面]
     * @author chenxu
     */
    public function login()
    {
      return $this->fetch('login/index');
    }
    
    /**
     * [dologin 处理登录]
     * @author chenxu
     */
    public function dologin()
    {
      $data = input("post.");//接受传过来的值
      $password = $data['password'];

      $subQuery = Db::name("myuser")->field('password')->where('username'.'='.$data["username"])->select();//返回查询结果

      $result = $subQuery[0]['password'];
      // echo Db::name("myuser")->getLastSql();//可以执行打印sql语句
      if (password_verify($password, $result)) {
          $this->success('登录成功', url('Admin/Admin/index') );
      } else {
        $this->success('账号/密码有误', url('Admin/Login/login') );
      }      
    }

    /**
     * [logout 退出登录]
     * @author chenxu
     */
    public function logout()
    {
      session("ext_user", NULL);
      $this->success('注销成功', 'index');
    }
}