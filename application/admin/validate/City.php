<?php
namespace app\admin\validate;
use think\Validate;

class City extends Validate
{
    protected $rule = [
        'city_name'  =>  'require|max:20',
        'parent_id'  =>  'require',
    ];
    protected $message  =   [
        'city_name.require' => '请填写城市名称',
        'parent_id.require' => '请选择上级城市',
        'city_name.max'     => '城市名称最多不能超过10个字符',
    ];

}

?>