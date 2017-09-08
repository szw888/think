<?php
namespace app\api\controller;

use think\Controller;

class City extends Controller{
    private $obj;
    public function _initialize(){
        $this->obj = model('admin/City');
    }
    /********获取二级数据*********/
    public function getSecond(){
        $firstId = input('post.firstId');
        if(!$firstId){
            $this->error('参数不合法');
        }
        $secondData = $this->obj->getSecondByfirst($firstId);

        if($secondData){
            $this->result(['code'=>1,'data'=>$secondData]);
        }else{
            $this->result(['code'=>0]);
        }
    }


}
?>