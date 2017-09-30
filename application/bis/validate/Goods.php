<?php
namespace app\bis\validate;
use think\Validate;

class Goods extends Validate
{
    protected $rule = [
        'name'=>'require',
        'city_id'=>'require',
        'image'=>'require',
        'location_id'  =>  'require',
        'start_time'  =>  'require',
        'end_time'  =>  'require',
        'total_count'  =>  'require|number',
        'org_price'  =>  'require',
        'current_price'  =>  'require',
        'quan_start_time'  =>  'require',
        'quan_end_time'  =>  'require',
        'category_id'  =>  'require|number',
        'description'  =>  'require|min:20',
    ];


}
?>