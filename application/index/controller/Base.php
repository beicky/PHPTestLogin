<?php
namespace app\index\controller;


use think\Controller;
use think\Db;


class Base extends Controller
{
	public function initialize(){
		if (!session('user')) {
            $this->error('请先登录', '/login');
        }
	}
	
}