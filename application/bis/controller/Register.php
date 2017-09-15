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
                }
            }

            /*判断账号是否存在*/
            $accExist = model('admin/Account')->get(['bis_user_name'=>$data['bis_user_name']]);
            if($accExist){
               $this->error('该商户账号已存在');
            }
            //商户入驻数据的添加
            //一、商户基本信息的添加
            $bisdata = [
                'bis_name'=>$data['bis_name'],
                'city_id'=>$data['city_id'],
                'city_path'=>empty($data['city_path']) ? $data['city_id'] : $data['city_id'].','.$data['city_path'],
                'bis_logo'=>$data['bis_logo'],
                'bis_licence_logo'=>$data['bis_licence_logo'],
                'bis_desc'=>$data['bis_desc'],
                'bank_info'=>$data['bank_info'],
                'bank_name'=>$data['bank_name'],
                'bank_user'=>$data['bank_user'],
                'faren'=>$data['faren'],
                'faren_contacts'=>$data['faren_contacts'],
                'bis_email'=>$data['bis_email'],
            ];
            $bisres = model('admin/Bis')->add($bisdata);


            //二、门店信息的添加
            $data['cate_two_id'] = '';
            if(!empty($data['category_se_id'])){
                $data['cate_two_id'] = implode('|',$data['category_se_id']);
            }
            $locationdata = [
                'location_name'=>$data['bis_name'],
                'telephone'=>$data['telephone'],
                'contacts'=>$data['contacts'],
                'bis_id'=>$bisres,
                'category_id'=>$data['category_id'],
                'category_path'=>$data['category_id'].','.$data['cate_two_id'],
                'city_id'=>$data['city_id'],
                'city_path'=>empty($data['city_id']) ? $data['city_id'] : $data['city_id'].','.$data['city_path'],
               'address'=>$data['address'],
                'xpoint'=>$res['result']['location']['lng'],
                'ypoint'=>$res['result']['location']['lat'],
                'open_time'=>$data['open_time'],
                'location_desc'=>$data['location_desc'],
            ];
            //三、账号信息的添加
            $data['code'] = mt_rand(100,10000);
            $accountdata = [
                'bis_id' => $bisres,
                'bis_user_name'=>$data['bis_user_name'],
                'code'=>$data['code'],
                'bis_user_password'=>md5($data['bis_user_password'].$data['code']),
                'is_main'     => 1
            ];

            $locationres = model('admin/Location')->add($locationdata);
            $accountres = model('admin/Account')->add($accountdata);
            if($bisres && $locationres && $accountres){
                $url = request()->domain().url('bis/register/checking',['id'=>$bisres]);

                \phpmailer\phpmailer\Email::sendmail('s15838257347@126.com','B2B商户入驻申请通知','您申请的入驻B2B商户正在审核，请点击<a href = "'.$url.'" target="_blank">查看链接</a>查看审核状态');
                $this->success('申请成功',url('bis/register/checking',['id'=>$bisres]));
            }else{
                $this->error('申请失败');
            }

        }
    }

    public function checking(){
        $bisId = input('param.id');
        if(empty($bisId)){
           $this->error('参数错误');
        }
        $status = db('Bis')->field('status')->where('id',$bisId)->find();

        $this->assign('status',$status);
        return $this->fetch();


    }


}