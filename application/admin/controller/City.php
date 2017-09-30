<?php
namespace app\admin\controller;
use think\Loader;
class City extends Base
{
    //城市----列表
    public function index()
    {
        header("Content-type: text/html; charset=utf-8");
        //获取城市数据
        $cityData = model('City')->getTree();
        $this->assign('cityData',$cityData);

        return $this->fetch();
    }

    //城市----添加
    public function add()
    {
        if(request()->isPost()){
            $data = input('post.');//获取表单提交的分类数据
            //验证表单提交的数据
            $validate = Loader::validate('admin/City');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }else{
                $res = model('admin/City')->add($data);
                if($res)
                    $this->success('添加成功',url('city/index'));
                else
                    $this->error('添加失败');

            }
        }else{
            //添加分类页面获取分类数据
            $cityData = model('City')->getTree();
            $this->assign('cityData',$cityData);
            return $this->fetch();
        }

    }


    // 城市------修改
    public function edit(){

        if(request()->isPost()){
            $cateid = input('post.cid');
            $data = ['city_name'=>input('post.city_name'),'parent_id'=>input('post.parent_id')];
            //表单验证
            $validate = Loader::validate('admin/City');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }else{
                $res = db('City')->where('id',$cateid)->update($data);
                if($res!==false){
                    $this->success('修改成功','City/index');
                }else{
                    $this->error('修改失败');
                }
            }

        }
        //获取所有城市数据
        $cityData = model('City')->getTree();
        $this->assign('cityData',$cityData);

        $cid = input('param.cid');//分类id
        if($cid) {
            $saved = db('City')->where('id', $cid)->find();
            $this->assign('saved',$saved);
        }

        return $this->fetch();

    }



}
