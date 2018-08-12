<?php
namespace app\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'email' =>  'email|require|max:200',
        'nick' =>  'require|max:80',
        'password' =>  'require|length:40',
    ];

    protected $message = [
        'password' => '密码hash错误',
    ];

}