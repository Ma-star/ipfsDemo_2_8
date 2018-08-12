<?php
namespace app\controller;

use app\model\Category;
use app\model\Picture;
use app\model\User;
use think\Controller;
use think\facade\Validate;

class Home extends Controller
{
    public function category()
    {
        $list = Category::all();
        return ['code'=>200,'data'=>$list];
    }

    public function picture($category=null,$user=null,$num=30)
    {
        $where = [];
        if ($category!=null) {
            $where['category'] = $category;
        }
        if ($user!=null) {
            $where['user'] = base64_decode(substr($user,1));
        }
        $list = Picture::where($where)
            ->field('hash,title')
            ->order('create_time', 'desc')
            ->paginate($num);
        return ['code'=>200,'data'=>$list];
    }

    public function search($keyword='',$num=30)
    {
        $list = Picture::where('title','like',$keyword)
            ->field('hash,title')
            ->order('create_time', 'desc')
            ->paginate($num);

        return ['code'=>200,'data'=>$list];
    }

    public function hash($hash,$num=30)
    {

        if(!Validate::length($hash,46)){
            return ['code'=>501,'msg'=>'hash错误！'];
        }

        $picture = Picture::where('hash',$hash)
            ->field('hash,title,user,description,info,size')
            ->find();
        if(!$picture){
            return ['code'=>501,'msg'=>'资源不存在！'];
        }
        $picture['nickname'] = User::get(base64_decode(substr($picture->user,1)))['nick'];
        return ['code'=>200,'data'=>$picture];
    }

}
