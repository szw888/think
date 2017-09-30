<?php
namespace app\admin\controller;

class Store extends Base
{
    //门店审核----列表
    public function index()
    {
        $join = [
            ['cate c','l.category_id=c.id'],
            ['city t','l.city_id=t.id']
        ];
        $location_lst = model('admin/location')->alias('l')->field('l.*,c.cate_name,t.city_name')->where('l.status',0)->join($join)->select();
        $this->assign('location_lst',$location_lst);
        return $this->fetch();
    }
    //门店----列表
    public function lst()
    {
        $join = [
            ['cate c','l.category_id=c.id'],
            ['city t','l.city_id=t.id']
        ];
        $location_lst = model('admin/location')->alias('l')->field('l.*,c.cate_name,t.city_name')->where('l.status',1)->join($join)->order('bis_id,id')->select();
        $this->assign('location_lst',$location_lst);
        return $this->fetch();
    }
    /* 分店详细信息   TYPE:GET
     * @param $locationid  分店ID
     * return string
     * */
    public function detail(){
        //获取一级城市
        $firstCity = model('admin/City')->where('parent_id','0')->select();
        //获取一级分类
        $firstCate = model('admin/Cate')->where('parent_id','0')->select();
        $this->assign(
            ['firstCity'=>$firstCity,'firstCate'=>$firstCate]
        );
        //接收参数
        $locationId = input('param.locationId');
        //根据参数查询数据
        $loc_res = model('admin/location')->where('id',$locationId)->find();

        //顶级分类或城市下的子类
        if($loc_res){
            $arr = explode(',',$loc_res['category_path']);
            if(!empty($arr[1])){
                $cate_path = explode('|',$arr[1]);
                $this->assign('cate_path',$cate_path);
            }

            $arr2 = explode(',',$loc_res['city_path']);
            if(!empty($arr2[1])){
               $this->assign('city_path',$arr2[1]);
            }
        }


        //返回数据
        $this->assign('loc_res',$loc_res);
        return $this->fetch();
    }



}
