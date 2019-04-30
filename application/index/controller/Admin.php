<?php
namespace app\index\controller;

use app\index\controller\Base;
use think\Db;
class Admin extends Base
{
    //案例列表
    public function caselist()
    {
        $list = Db::name('caselist')->paginate(5);
        $this->assign('list',$list);
        return $this->fetch();
    }
    //新增案例
    public function caseadd()
    {
        $id = request()->param('id');
        if($id){
            $list = Db::name('caselist')->where('id',$id)->find();
            $this->assign('list',$list);
        }else{
            if ($this->request->isPost()) {
                $data = $this->request->param();
                $info['key'] = $data['key'];
                $info['sort'] = $data['sort'];
                $info['describe'] = $data['describe'];
                $pic = request()->file("pic");
                if($pic){
                    $pic_info = $pic->move(__UPLOADS__ . DIRECTORY_SEPARATOR . 'uploads');
                    if($pic_info){
                        $picdata = $pic_info->getSaveName();
                        $picdata = str_replace("\\", '/', $picdata);
                        $info['pic'] = $picdata;
                    }
                }
                $res = Db::name('caselist')->insert($info);
                if($res){
                    $this->success('添加成功', '/caselist');
                }else{
                    $this->error('添加失败');
                }
            }
        }
        $this->assign('id',$id);
        return $this->fetch();
    }
    //编辑案例
    public function caseedit()
    {
        $id = request()->param('id');
        $list = Db::name('caselist')->where('id',$id)->find();
        if ($this->request->isPost()) {
            $data = $this->request->param();
            $info['key'] = $data['key'];
            $info['sort'] = $data['sort'];
            $info['describe'] = $data['describe'];
            $pic = request()->file("pic");
            if($pic){
                $pic_info = $pic->move(__UPLOADS__ . DIRECTORY_SEPARATOR . 'uploads');
                if($pic_info){
                    $picdata = $pic_info->getSaveName();
                    $picdata = str_replace("\\", '/', $picdata);
                    $info['pic'] = $picdata;
                }
            }
        }
        $res = Db::name('caselist')->where('id',$id)->update($info);
        if($res){
            $this->success('修改成功', '/caselist');
        }else{
            $this->error('修改失败');
        }
        $this->assign('list',$list);
        $this->assign('id',$id);
    }
    //删除案例
    public function casedel(){
        $id = request()->param('id');
        $res = Db::name('caselist')->where('id',$id)->delete();
        if($res){
            $this->success('删除成功', '/caselist');
        }else{
            $this->error('删除失败');
        }
    }
}
