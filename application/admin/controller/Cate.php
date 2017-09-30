<?php
namespace app\admin\controller;
use think\Loader;
class Cate extends Base
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

    // 分类修改
    public function edit(){

        if(request()->isPost()){
            $cateid = input('post.cid');
            $data = ['cate_name'=>input('post.cate_name'),'parent_id'=>input('post.parent_id')];
            //表单验证
            $validate = Loader::validate('Cate');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }else{
                $res = db('Cate')->where('id',$cateid)->update($data);
                if($res!==false){
                    $this->success('修改成功','Cate/index');
                }else{
                    $this->error('修改失败');
                }
            }

        }
        //获取所有分类数据
        $cateData = model('Cate')->getTree();
        $this->assign('cateData',$cateData);

        $cid = input('param.cid');//分类id
        if($cid) {
            $saved = db('Cate')->where('id', $cid)->find();
            if($cateData){
                $this->assign('saved',$saved);
            }
        }

        return $this->fetch();

    }

    //分类排序
    public function sort(){
        $data = input('post.');
        $res = model('Cate')->update(['id' => $data['cid'], 'list_order' => $data['val']]);
        if($res){
            echo json_encode(['code'=>1,'msg'=>'更新成功']);
        }else{
            echo json_encode(['code'=>-1,'msg'=>'更新失败']);
        }

    }

}
