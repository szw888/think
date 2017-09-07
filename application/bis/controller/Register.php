<?php
namespace app\bis\controller;

use think\Controller;

class Register extends Controller
{
    public function index(){
        //获取一级城市
        $firstCity = model('admin/City')->where('parent_id','0')->select();
        //获取一级分类
        $firstCate = model('admin/Cate')->where('parent_id','0')->select();
        $this->assign(
            ['firstCity'=>$firstCity,'firstCate'=>$firstCate]
        );
        return $this->fetch();
    }
    /********获取二级数据*********/
    public function getSecond(){
        $firstId = input('post.firstId');

        if(input('post.type')==1){
            $secondData = model('admin/City')->getSecondByfirst($firstId);
        }else{
            $secondData = model('admin/Cate')->getSecondByfirst($firstId);
        }

        if($secondData){
            $this->result(['code'=>1,'data'=>$secondData]);
        }else{
            $this->result(['code'=>0]);
        }
    }
}