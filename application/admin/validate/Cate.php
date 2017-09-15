<?php
namespace app\admin\validate;
use think\Validate;

class Cate extends Validate
{
    protected $rule = [
        'cate_name'  =>  'require|max:20|unique:Cate',
    ];
    protected $message  =   [
        'cate_name.require' => '请填写分类名称',
        'cate_name.unique' => '分类名称不能重复',
        'cate_name.max'     => '分类名称最多不能超过10个字符',
    ];

}

?>