<?php
namespace app\admin\model;
use think\Db;
use think\Model;
use think\Page;
use think\Verify;
use think\Session;
use think\Input;
use think\Request;

class Admin extends \think\Model
{

	//自定义初始化
    // protected function initialize()
    // {
    //    //需要调用`Model`的`initialize`方法
    //     parent::initialize();
    //     //TODO:自定义的初始化
    // }
    //判断电话号码
	public function getLognameAjax($username)
	{
		// $res = input('post.');
		// die;
		$result = Db::query('select username from think_myuser where username=?',[$username]);

		if ( $result ) {
			return 1;
		} else {
			return 0;
		}
	}
}
