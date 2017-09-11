<?php
namespace app\bis\controller;
use think\Loader;
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
    /*处理商户填写的数据*/
    public function add(){
        if(request()->isPost()){
            $data = input('post.');

            //数据校验
            $validate_bis = Loader::validate('bis');
            $validate_location = Loader::validate('location');
            $validate_account = Loader::validate('account');
            if(!$validate_bis->check($data)) {
                $this->error($validate_bis->getError());
            }elseif (!$validate_location->check($data)){
                $this->error($validate_location->getError());
            }elseif (!$validate_account->check($data)){
                $this->error($validate_account->getError());
            }else{
                $res = \Map::getLLByAddress($data['address']);
                if($res['status']!=0 || $res['result']['precise']!=1){
                    $this->error('请填写详细的门店地址');
                }else{
                    //商户入驻数据的添加
                }


            }
        }
    }


}