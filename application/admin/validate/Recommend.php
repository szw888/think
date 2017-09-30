<?php
namespace app\admin\validate;
use think\Validate;

class Recommend extends Validate
{
    protected $rule = [
        'title'  =>  'require|max:30|unique:Recommend',
        'img'  =>  'require',
        'type'   =>  'require|number',
        'url'    =>  'require|url',
        'description'=>'require|min:20'
    ];


}

?>