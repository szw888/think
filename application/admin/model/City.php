<?php
//城市模块
namespace app\admin\model;
use app\admin\model\Base;
use think\Model;

class City extends Base
{

    //数据的添加
    public function add($data){
        $data['status'] = 1;
        return $this->save($data);
    }

}
