<?php
namespace app\admin\controller;
use think\Controller;
use think\Loader;
class User extends Controller
{

    /*
     * 管理员登录   type : post
     * @param $username
     * $param $password
     *
     * */
    public function login(){
        if(request()->isPost()){
            //获取数据
            $data = input('post.');
            //验证数据
            $result = $this->validate($data,['username'  =>  'require|max:20|chsDash', 'password' =>'require']);
            if(true !== $result){
                // 验证失败 输出错误信息
                $this->error($result);
            }
            //检测用户名、密码
            $check_admin = db('admin')->where('username',$data['username'])->find();
            if(!$check_admin){
                $this->error('该管理员不存在');
            }
            if(md5($data['password']) !== $check_admin['password']){
                $this->error('密码错误');
            }
            session('admin_user_session',$check_admin,'admin');
            $this->success('登录成功',url('admin/index/index'));
        }

        if(session('admin_user_session','','admin') !== null || session('admin_user_session','','admin') !== ''){
            $this->redirect('admin/index/index');
        }
        return $this->fetch();
    }

    /*
     * 退出登录
     * */
    public function logout(){

        $this->redirect('admin/user/login');
    }
}
