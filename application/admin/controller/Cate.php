<?php
namespace app\admin\controller;
use think\Controller;
use think\Loader;
class Cate extends Controller
{
    //分类----列表
    public function index()
    {

        //获取分类数据
        $cateData = db('Cate')->select();
        $this->assign('cateData',$cateData);

        return $this->fetch();
    }
    //分类----添加
    public function add()
    {
        if(request()->isPost()){

            $data = input();//获取表单提交的分类数据
            //验证表单提交的数据
            $validate = Loader::validate('Cate');

            if(!$validate->check($data)){
                $this->error($validate->getError());
            }else{
                $res = db('Cate')->insert($data);
                if($res){
                    $this->success('添加成功',url('cate/index'));
                }else{
                    $this->error('添加失败');
                }
            }
        }else{
            //添加分类页面获取分类数据
            $cateData = db('Cate')->select();
            $this->assign('cateData',$cateData);
            return $this->fetch();
        }

    }
}
