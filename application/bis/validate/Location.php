<?php
namespace app\bis\validate;
use think\Validate;

class Location extends Validate
{
    protected $rule = [
        'location_name'=>'require',
        'city_id'=>'require',
        'logo'=>'require',
        'telephone'  =>  'require',
        'contacts'  =>  'require',
        'category_id'  =>  'require',
        'address'  =>  'require',
        'open_time'  =>  'require',
        'location_desc'  =>  'require',
    ];
    protected $message  =   [
        'telephone.require' => '请填写门店电话',
        'contacts.require' => '请填写门店联系方式',
        'category_id.require' => '请选择门店分类',
        'address.require' => '请填写门店地址',
        'open_time.require' => '请填写门店营业时间',
        'location_desc.require' => '请填写门店简介',
    ];

}
?>