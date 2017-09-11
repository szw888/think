<?php
namespace app\bis\validate;
use think\Validate;

class Account extends Validate
{
    protected $rule = [
        'bis_user_name'  =>  'require',
        'bis_user_password'  =>  'require',
    ];
    protected $message  =   [
        'bis_user_name.require' => '请填写商户用户名',
        'bis_user_password.require' => '请填写商户密码',
    ];

}
?>