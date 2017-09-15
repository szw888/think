<?php
namespace app\admin\validate;
use think\Validate;

class City extends Validate
{
    protected $rule = [
        'city_name'  =>  'require|max:20|unique:City',
        'city_uname'  =>  'require|max:20|unique:City',
    ];
    protected $message  =   [
        'city_name.require' => '请填写城市',
        'city_name.unique' => '城市不能重复',
        'city_name.max'     => '城市名称最多不能超过10个字符',
        'city_uname.require' => '请填写城市英文名称',
        'city_uname.unique' => '城市英文名称不能重复',
        'city_uname.max'     => '城市英文名称最多不能超过10个字符',
    ];

}

?>