<?php
namespace app\admin\controller;

class Goods extends Base
{

    public function detail(){
        //获取一级城市
        $firstCity = model('admin/City')->where('parent_id','0')->select();
        //获取一级分类
        $firstCate = model('admin/Cate')->where('parent_id','0')->select();

        //接收参数
        $goods_id = input('param.goodsId');
        $goods_res = model('admin/goods')->where('id',$goods_id)->find();

        $this->assign(
            ['firstCity'=>$firstCity,'firstCate'=>$firstCate,'goods_res'=>$goods_res]
        );
        return $this->fetch();
    }




}
