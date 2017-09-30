<?php
namespace app\bis\controller;

use think\Controller;
use think\Loader;
class Store extends Base
{
    /* 门店列表
     * */
    public function index()
    {
        //查询该商户下的所有门店
        $bisres = session('bis_user_session','','bis');
        $join = [
            ['cate c','l.category_id=c.id'],
            ['city t','l.city_id=t.id']
        ];
        $location_lst = model('admin/location')->field('c.cate_name,t.city_name,l.*')->alias('l')->join($join)->where('bis_id',$bisres->bis_id)->where('l.status',1)->select();
        $this->assign('location_lst',$location_lst);
        return $this->fetch();
     }
    /* 新增分店
     * */
    public function add()
    {
        //获取一级城市
        $firstCity = model('admin/City')->where('parent_id','0')->select();
        //获取一级分类
        $firstCate = model('admin/Cate')->where('parent_id','0')->select();
        $this->assign(
            ['firstCity'=>$firstCity,'firstCate'=>$firstCate]
        );
        if(request()->isPost()){
            $data = input('post.');

            //数据校验
            $validate_location = Loader::validate('location');
            if(!$validate_location->check($data)) {
                $this->error($validate_location->getError());
            }
            $res = \Map::getLLByAddress($data['address']);
            if($res['status']!=0 || $res['result']['precise']!=1){
                $this->error('请填写详细的分店地址');
            }
            $bisres = session('bis_user_session','','bis');

            $data['cate_two_id'] = '';
            if(!empty($data['category_se_id'])){
                $data['cate_two_id'] = implode('|',$data['category_se_id']);
            }
           $locationdata = [
                'location_name'=>$data['location_name'],
                'logo'=>$data['logo'],
                'telephone'=>$data['telephone'],
                'contacts'=>$data['contacts'],
                'bis_id'=>$bisres->bis_id,
                'category_id'=>$data['category_id'],
                'category_path'=>$data['category_id'].','.$data['cate_two_id'],
                'city_id'=>$data['city_id'],
                'city_path'=>empty($data['city_id']) ? $data['city_id'] : $data['city_id'].','.$data['city_path'],
                'address'=>$data['address'],
                'xpoint'=>$res['result']['location']['lng'],
                'ypoint'=>$res['result']['location']['lat'],
                'open_time'=>$data['open_time'],
                'is_main' => 0,
                'location_desc'=>$data['location_desc'],
            ];
            $res = model('admin/Location')->add($locationdata);
            if($res){
                $this->success('分店申请成功','bis/store/index');
            }else{
                $this->error('分店申请失败');
            }
        }
        return $this->fetch();
    }

    public function detail(){
        //获取一级城市
        $firstCity = model('admin/City')->where('parent_id','0')->select();
        //获取一级分类
        $firstCate = model('admin/Cate')->where('parent_id','0')->select();

        //接收参数
        $locationi_id = input('param.locationId');
        $loc_res = model('admin/location')->where('id',$locationi_id)->find();

        $this->assign(
            ['firstCity'=>$firstCity,'firstCate'=>$firstCate,'loc_res'=>$loc_res]
        );
        return $this->fetch();
    }
}
