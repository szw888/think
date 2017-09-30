<?php
namespace app\bis\controller;

use think\Controller;
use think\Loader;
class Goods extends Base
{
    /* 团购列表
     * */
    public function index()
    {
        //查询该商户下的所有团购商品
        $bisres = session('bis_user_session','','bis');
        $goods_lst = model('admin/goods')->where('bis_id',$bisres->bis_id)->paginate(2);

        $this->assign('goods_lst',$goods_lst);
        return $this->fetch();
     }
    /* 新增团购
     * */
    public function add()
    {
        //获取一级城市
        $firstCity = model('admin/City')->where('parent_id','0')->select();
        //获取一级分类
        $firstCate = model('admin/Cate')->where('parent_id','0')->select();
        //获取该商户下的所有门店
        $bisres = session('bis_user_session','','bis');
        $where = [
                'bis_id'=>$bisres->bis_id,
                'status'=>1
        ];
        $location_lst = model('admin/location')->field('location_name,id')->where($where)->select();
        //模板输出
        $this->assign(
            ['firstCity'=>$firstCity,'firstCate'=>$firstCate,'location_lst'=>$location_lst]
        );

        if(request()->isPost()){
            //接收数据
            $data = input('post.');
            //验证数据
            $validate = Loader::validate('bis/goods');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }

            //获取第一个门店的经纬度
            if(isset($data['location_id'])){
                $location_data = model('admin/Location')->where('id',$data['location_id'][0])->find();
            }

            //存入团购表
            $res = [
                'bis_id'=>$bisres->bis_id,
                'name'=>$data['name'],
                'city_id'=>$data['city_id'],
                'city_path'=>empty($data['city_path']) ? $data['city_id'] : $data['city_id'].','.$data['city_path'],
                'image'=>$data['image'],
                'start_time'=>strtotime($data['start_time']),
                'end_time'=>strtotime($data['end_time']),
                'total_count'=>$data['total_count'],
                'org_price'=>$data['org_price'],
                'current_price'=>$data['current_price'],
                'quan_start_time'=>strtotime($data['quan_start_time']),
                'quan_end_time'=>strtotime($data['quan_end_time']),
                'category_id'=>$data['category_id'],
                'category_se_id'=>empty($data['category_se_id']) ? '' : implode(',',$data['category_se_id']),
                'location_id'=>empty($data['location_id']) ? '' : implode(',',$data['location_id']),
                'description'=>$data['description'],
                'xpoint'=>isset($location_data['xpoint']) ? $location_data['xpoint'] : '',
                'ypoint'=>isset($location_data['ypoint']) ? $location_data['ypoint'] : '',
                'bis_account_id'=>$bisres->id
            ];

            $result = model('admin/goods')->add($res);
            if($result){
                $this->success('添加团购成功');
            }else{
                $this->error('添加团购失败');
            }

        }
        //模板渲染
        return $this->fetch();
    }


    /*
     * 查看团购商品的详细信息  GET
     * @param $goodsid  商品ID
     * */
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
