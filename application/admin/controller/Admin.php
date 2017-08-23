<?php
namespace app\admin\controller;

use think\Db;
use think\View;
use think\Input;
use think\Request;
use think\Controller;

class Admin extends \think\Controller
{
    /**
     * [index 后台首页]
     * @author chenxu
     */
    public function index()
    {

    	$serverInfo = array(
			//获取服务器信息（操作系统、Apache版本、PHP版本）
			'server_version' => $_SERVER['SERVER_SOFTWARE'],
			//获取服务器时间
			'server_time' => date('Y-m-d H:i:s', time()),
			//获取浏览器类型
			'browser_type'=>$_SERVER['HTTP_USER_AGENT'],
			//上传文件大小限制
			'max_upload' => ini_get('file_uploads') ? ini_get('upload_max_filesize') : '已禁用', 
			//脚本最大执行时间
	        'max_ex_time' => ini_get('max_execution_time').'秒', 

	        'web_root' => $_SERVER['DOCUMENT_ROOT'],//当前运行 PHP 程序所在的文档根目录，在服务器配置文件中定义。

			'gateway_interface' => $_SERVER['GATEWAY_INTERFACE'],//服务器使用的 CGI 规范的版本，例如：“CGI/1.1”。
			'server_addr' => $_SERVER['SERVER_ADDR'],//当前运行 PHP 程序所在的服务器的 IP 地址。
			'server_name' => $_SERVER['SERVER_NAME'],//当前运行 PHP 程序所在的服务器的名称。
			'server_admin' => $_SERVER['SERVER_ADMIN'],//Apache 服务器配置文件中的 SERVER_ADMIN 参数。
			'server_port' => $_SERVER['SERVER_PORT'],//服务器所使用的端口。如果使用 SSL 安全连接，则这个值为用户设置的 HTTP 端口。
			'server_signture' => $_SERVER['SERVER_SIGNATURE'],//包含服务器版本和虚拟主机名的字符串。
			'server_portocol' => $_SERVER['SERVER_PROTOCOL'],//请求页面时通信协议的名称和版本，例如：“HTTP/1.0”。

			);
			//视图
			$this->assign('serverInfo',$serverInfo);

      	return $this->fetch('admin/index'); 
    }

    /**
     * [useradmin 管理员列表]
     * @return [type] [description]
     */
    public function useradmin()
    {
    	$this->view->engine->layout(true);
    	return $this->fetch('admin/useradmin'); 
    }

    /**
     * [adduseradmin 添加管理员]
     * @return [type] [description]
     */
    public function adduseradmin($logname,$confirmpass,$phone,$email,$yanzhenma)
    {
        $postData = input('post.');
        dump($postData);
        $captcha = $postData['yanzhenma'];
        if(!captcha_check($captcha)){
            // return $this->error('验证码错误');
            return $this->error('验证码错误', url('Admin/admin/useradmin'),2);
        }
    }

     /**
      * [getLognameAjax 判断用户名是否已经注册]
      * @return [type] [description]
      */
    public function getLognameAjax($username)
    {
        $result = Db::query('select username from think_myuser where username=?',[$username]);
        if ( $result ){
            return 1;
        }
    }

     /**
      * [getPhoneAjax 判断手机号是否已经注册]
      * @return [type] [description]
      */
    public function getPhoneAjax($phone)
    {
        $result = Db::query('select phone from think_myuser where phone=?',[$phone]);
        if ( $result ){
            return 1;
        }
    }

    /**
      * [getEmailAjax 判断手机号是否已经注册]
      * @return [type] [description]
      */
    public function getEmailAjax($email)
    {
        $result = Db::query('select email from think_myuser where email=?',[$email]);
        if ( $result ){
            return 1;
        }
    }

    /**
     * [dateview 数据图表]
     * @return [type] [description]
     */
    public function dateview()
    {
    	$this->view->engine->layout(true);
    	return $this->fetch('admin/dateview'); 
    }

    /**
     * [mailbox 评论管理列表]
     * @return [type] [description]
     */
    public function mailbox()
    {
    	$this->view->engine->layout(true);
    	return $this->fetch('admin/mailbox'); 
    }

    /**
     * [maildetail 评论详情]
     * @return [type] [description]
     */
    public function maildetail()
    {
    	$this->view->engine->layout(true);
    	return $this->fetch('admin/maildetail'); 
    }

    /**
     * [department 部门列表]
     * @return [type] [description]
     */
    public function department()
    {
    	$this->view->engine->layout(true);
    	return $this->fetch('admin/department'); 
    }

    /**
     * [leaguer 会员列表]
     * @return [type] [description]
     */
    public function leaguer()
    {
    	$this->view->engine->layout(true);
    	return $this->fetch('admin/leaguer'); 
    }

    /**
     * [classify 分类列表]
     * @return [type] [description]
     */
    public function classify()
    {
    	$this->view->engine->layout(true);
    	return $this->fetch('admin/classify'); 
    }

    /**
     * [goods 商品列表]
     * @return [type] [description]
     */
    public function goods()
    {
    	$this->view->engine->layout(true);
    	return $this->fetch('admin/goods'); 
    }

    /**
     * [order 订单列表]
     * @return [type] [description]
     */
    public function order()
    {
    	$this->view->engine->layout(true);
    	return $this->fetch('admin/order'); 
    }

    /**
     * [power 权限列表]
     * @return [type] [description]
     */
    public function power()
    {
    	$this->view->engine->layout(true);
    	return $this->fetch('admin/power'); 
    }
}



