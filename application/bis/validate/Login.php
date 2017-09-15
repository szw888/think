<?php
namespace app\bis\validate;
use think\Validate;

class Login extends Validate
{
    protected $rule = [

        'bis_user_name'  =>  'require',
        'bis_user_password'  =>  'require',
    ];
    protected $message  =   [
        'bis_user_name.require' => '请输入账号',
        'bis_user_password.require' => '请输入密码',
    ];


}
?>