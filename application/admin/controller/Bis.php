<?php
namespace app\admin\controller;
use think\Controller;
use think\Loader;
class Bis extends Controller
{
    //商户审核----列表
    public function apply()
    {
        header("Content-type: text/html; charset=utf-8");
        $applyData = model('Bis')->where('status',0)->order('id desc')->select();
        $this->assign('applyData',$applyData);
        return $this->fetch();
    }



}
