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

}