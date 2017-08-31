<?php
namespace app\admin\controller;
use think\Controller;
use think\Loader;
class Cate extends Controller
{
    //分类----列表
    public function index()
    {
        header("Content-type: text/html; charset=utf-8");
        //获取分类数据

        $cateData = model('Cate')->getTree();
        $this->assign('cateData',$cateData);

        return $this->fetch();
    }
    //分类----添加
    public function add()
    {
        if(request()->isPost()){
            $data = input('post.');//获取表单提交的分类数据
            //验证表单提交的数据
            $validate = Loader::validate('Cate');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }else{
                $res = model('Cate')->add($data);
                if($res)
                    $this->success('添加成功',url('cate/index'));
                else
                    $this->error('添加失败');

            }
        }else{
            //添加分类页面获取分类数据
            $cateData = model('Cate')->getTree();
            $this->assign('cateData',$cateData);
            return $this->fetch();
        }

    }
    //分类删除
    public function del(){
        $cid = input('post.cid');
        $res = db('Cate')->delete($cid);
        if($res){
            $arr = ['code'=>1,'msg'=>'删除成功'];
            echo json_encode($arr);
        }else{
            $arr = ['code'=>0,'msg'=>'删除失败'];
            echo json_encode($arr);
        }
    }
}
