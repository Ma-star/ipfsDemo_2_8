<?php
namespace app\controller;

use app\model\Picture;
use app\model\User;
use think\facade\Cache;
use think\facade\Validate;
use think\Request;

class Users
{
    public function register(Request $request)
    {
        $data = $request->post();

        $validate = new \app\validate\User;

        if (!$validate->check($data)) {
            return ['code'=>500,'msg'=>$validate->getError()];
        }

        $user = User::getByEmail($data['email']);
        if($user){
            return ['code'=>501,'msg'=>'邮箱已注册，请前往登陆！'];
        }
        $data['password'] = sha1($data['email'].$data['password']);

        $user = new User($data);
        $user->allowField(['email','nick','password'])->save();
        if($user){
            return ['code'=>200,'msg'=>'注册成功!'];
        }
        return ['code'=>501,'msg'=>'注册失败!'];
    }

    public function login(Request $request)
    {
        $email = $request->post('email','');
        $password = $request->post('password','');

        if (!Validate::isEmail($email)) {
            return ['code'=>500,'msg'=>'email格式错误'];
        }
        $user = User::getByEmail($email);
        if($user){
            if($user->password===sha1($email.$password)){
                $token =  md5(uniqid(md5(microtime(true)), true));
                Cache::tag('token')->set($token,$user,3600);
                $data = [
                    'email' =>  $user->email,
                    'nick'  =>  $user->nick,
                    'user'  =>  'u'.base64_encode($user->id),
                ];
                return ['code'=>200,'token'=>$token,'msg'=>'登陆成功!','user'=>$data];
            }
            return ['code'=>200,'msg'=>'用户名或密码错误！'];

        }
        return ['code'=>501,'msg'=>'用户不存在，请前往注册!'];
    }

    public function add(Request $request)
    {
        $token = $request->post('token','');

        if(!Validate::length($token,32)){
            return ['code'=>501,'msg'=>'token错误！'];
        }

        $user = Cache::get($token);

        if(!$user) {
            return ['code' => 501, 'msg' => 'token错误！'];
        }

        $data =[
            'hash'=>$request->post('hash',''),
            'title'=>$request->post('title',''),
            'category'=>$request->post('category',''),
            'description'=>$request->post('description',''),
            'info'=>$request->post('info','{}','json_decode'),
            'size'=>$request->post('size',''),
            'user'=>$user->id,
        ];

        $validate = new \app\validate\Picture;

        if (!$validate->check($data)) {
            return ['code'=>500,'msg'=>$validate->getError()];
        }

        $picture = Picture::getByHash($data['hash']);
        if($picture){
            return ['code'=>501,'msg'=>'资源已存在，请勿重复上传！'];
        }

        $picture = new Picture($data);
        $picture->save();
        if($picture){
            return ['code'=>200,'msg'=>'添加成功!'];
        }
        return ['code'=>501,'msg'=>'添加失败!'];
    }
    public function update(Request $request)
    {
        $token = $request->post('token','');

        if(!Validate::length($token,32)){
            return ['code'=>501,'msg'=>'token错误！'];
        }

        $user = Cache::get($token);

        if(!$user) {
            return ['code' => 501, 'msg' => 'token错误！'];
        }

        $data =[
            'hash'=>$request->post('hash',''),
            'title'=>$request->post('title',''),
            'category'=>$request->post('category',''),
            'description'=>$request->post('description',''),
            'info'=>$request->post('info','{}','json_decode'),
            'size'=>$request->post('size',''),
            'user'=>$user->id,
        ];

        $validate = new \app\validate\Picture;

        if (!$validate->check($data)) {
            return ['code'=>500,'msg'=>$validate->getError()];
        }

        $picture = Picture::getByHash($data['hash']);
        if(!$picture){
            return ['code'=>501,'msg'=>'资源不存在！'];
        }

        $picture->save($data);
        if($picture){
            return ['code'=>200,'msg'=>'修改成功!'];
        }
        return ['code'=>501,'msg'=>'修改失败!'];
    }

    //TODO 修改密码API
    public function resetpassword(Request $request)
    {
        $token = $request->post('token','');

        if(!Validate::length($token,32)){
            return ['code'=>501,'msg'=>'token错误！'];
        }

        $user = Cache::get($token);

        if(!$user) {
            return ['code' => 501, 'msg' => 'token错误！'];
        }
        return ['code'=>501,'msg'=>'接口未实现!'];
    }

}
