<?php
namespace app\bis\validate;
use think\Validate;

class Bis extends Validate
{
    protected $rule = [

        'bis_name'  =>  'require|max:20',
        'city_id'  =>  'require',
        'bis_logo'  =>  'require',
        'bis_licence_logo'  =>  'require',
        'bank_info'  =>  'require',
        'bank_name'  =>  'require',
        'bank_user'  =>  'require',
        'faren'  =>  'require',
        ['faren_contacts', 'require|checkMobile', '请输入法人手机号码|法人手机号码格式错误'],
        'bis_email'  =>  'require|email',
    ];
    protected $message  =   [
        'bis_name.require' => '请填写商户名称',
        'bis_logo.require' => '请上传商户Logo',
        'bis_licence_logo.require' => '请上传商户营业执照',
        'city_id.require' => '请选择所在城市',
        'bis_name.max'     => '商户名称最多不能超过10个字符',
        'bank_info.require' => '请填写银行账号',
        'bank_name.require' => '请填写开户行名称',
        'bank_user.require' => '请填写开户人姓名',
        'faren.require' => '请填写法人',
        'bis_email.require' => '请填写商户邮箱',
        'bis_email.email' => '请填写正确的邮箱格式',
    ];
    function checkMobile($value){
        if(preg_match("/^1[34578]\d{9}$/",$value)){
            return true;
        }else{
            return false;
        }
    }

}
?>