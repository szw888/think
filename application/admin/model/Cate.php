<?php
//分类模块
namespace app\admin\model;
use app\admin\model\Base;
use think\Model;

class Cate extends Base
{
    //数据的添加
    public function add($data){
        $data['status'] = 1;
        $this->save($data);
        return $this->id;
    }


}
