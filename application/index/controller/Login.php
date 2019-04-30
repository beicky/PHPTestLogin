<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
class Login extends Controller
{
	//登录页面
    public function login()
    {
        return $this->fetch();
    }
    //登录验证
    public function dologin(){
        if ($this->request->isPost()) {
            $data = $this->request->param();
            if(empty($data['username'])){
                $this->error('用户名不能为空');
            };
            if(empty($data['password'])){
                $this->error('密码不能为空');
            };
            $has = Db::name('user')->where('username', $data['username'])->find();
            if(empty($has)){
                $this->error('用户名不存在');
            };
            $user = Db::name('user')->where('username', $data['username'])->where('password', md5($data['password']))->find();
            if(empty($user)){
                $this->error('密码错误');
            }else{
                session('user', $user['id']);
                $this->success('登录成功', 'admin/caselist');
            }
        }
    }
    //退出登录
    public function logout()
    {
        session('user',null);
        $this->success('退出成功', '/login');
    }
}