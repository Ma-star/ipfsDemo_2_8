<?php
namespace app\validate;

use think\Validate;

class Picture extends Validate
{
    protected $rule = [
        'hash' =>  'require|length:46',
        'title' =>  'require|max:80',
        'category' =>  'require|max:10',
        'size' =>  'require|integer',
    ];

}