<?php
namespace app\model;

use think\Model;
use think\model\concern\SoftDelete;

class Picture extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    protected function getInfoAttr($value)
    {
        return json_decode($value);
    }

    protected function getUserAttr($value)
    {
        return 'u'.base64_encode($value);
    }
}