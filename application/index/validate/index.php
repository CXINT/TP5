<?php
namespace app\index\validate;
use think\Validate;
class index extends Validate
{
// 验证规则
protected $rule = [
'nickname' => 'require|min:5|token',
'data' => 'require|email',
'birthday' => 'dateFormat:Y-m-d',
];
}

