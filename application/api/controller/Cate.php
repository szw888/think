<?php
namespace app\api\controller;

use think\Controller;

class Cate extends Controller{
    private $obj;
    public function _initialize(){
        $this->obj = model('admin/Cate');
    }
    /********获取二级数据*********/
    public function getSecond(){
        $firstId = input('post.firstId');
        $secondData = $this->obj->getSecondByfirst($firstId);
        if($secondData){
            $this->result(['code'=>1,'data'=>$secondData]);
        }else{
            $this->result(['code'=>0]);
        }
    }


}
?>