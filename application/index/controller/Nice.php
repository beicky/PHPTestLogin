<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
class Nice extends Controller
{
    public function nice()
    {
        return $this->fetch();
    }
    public function xiongdienice(){
        $data = $this->request->param();
        $user = Db::query("select * from user");
        echo (json_encode($user));
    }
}