<?php
namespace app\bis\controller;

use think\Controller;
use think\Loader;
class Login extends Controller
{
    public function index(){
        if(request()->isPost()){
            $data = input('post.');
            $validate = Loader::validate('bis/Login');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            /*验证账号*/
            $bis_account = model('admin/Account')->get(['bis_user_name'=>$data['bis_user_name']]);
            if(empty($bis_account)||!$bis_account||$bis_account['status']!=1){
                $this->error('该账号不存在或未通过审核');
            }
            /*通过账号验证密码*/
            $newpass = md5($data['bis_user_password'].$bis_account['code']);
            if($newpass !== $bis_account['bis_user_password']){
                $this->error('密码错误！');
            }
            /*更新最后登录时间*/
            model('admin/Account')->save([
                'last_login_time'=> time()
            ],['id' => $bis_account['id']]);
            /*将商户登录数据保存至session*/
            session('bis_user_session',$bis_account,'bis');
            $this->success('登录成功',url('bis/index/index'));
        }

        return $this->fetch();
    }
}