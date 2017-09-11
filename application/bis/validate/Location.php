<?php
namespace app\bis\validate;
use think\Validate;

class Location extends Validate
{
    protected $rule = [
        'telephone'  =>  'require',
        'contacts'  =>  'require',
        'category_id'  =>  'require',
        'address'  =>  'require',
        'open_time'  =>  'require',
        'location_desc'  =>  'require',
    ];
    protected $message  =   [
        'telephone.require' => '请填写总店电话',
        'contacts.require' => '请填写总店联系方式',
        'category_id.require' => '请选择总店分类',
        'address.require' => '请填写总店地址',
        'open_time.require' => '请填写总店营业时间',
        'location_desc.require' => '请填写总店简介',
    ];

}
?>