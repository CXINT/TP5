<?php
//配置文件
return [
		'view_replace_str'  =>  [
			'__PUBLIC__'=>'/tp5/public/static',
			'__ROOT__' => '',
            '__HOME__'=>'http://192.168.1.26/tp5/public/index.php'//指定绝对路径的时候可以用__HOME__
		],
	
		// 扩展函数文件
    	'extra_file_list'   => [
    		APP_PATH . 'helper' . EXT, 
    		THINK_PATH . 'helper' . EXT
    	],

    	'template'  =>  [
    		'layout_on'     =>  true,
    		'layout_name'   =>  'layout',
    		'layout_item'   =>  '{__CONTENT__}'
		  ],

        'captcha'  => [
            // 验证码字符集合
            'codeSet'  => '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY', 
            // 验证码字体大小(px)
            'fontSize' => 10, 
            // 是否画混淆曲线
            'useCurve' => true, 
             // 验证码图片高度
            'imageH'   => 30,
            // 验证码图片宽度
            'imageW'   => 100, 
            // 验证码位数
            'length'   => 5, 
            // 验证成功后是否重置        
            'reset'    => true
        ],

  	
	];