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
    //商户----列表
    public function index()
    {
        header("Content-type: text/html; charset=utf-8");
        $succData = model('Bis')->where('status',1)->order('id desc')->select();
        $this->assign('succData',$succData);
        return $this->fetch();
    }
    //修改状态
    public function status(){
        $data = input('post.');
        $res = model('Bis')->update(['id' => $data['cid'], 'status' => $data['status']]);
        if($res){
            $this->result(['code'=>1,'msg'=>'操作成功']);
        }else{
            $this->result(['code'=>-1,'msg'=>'操作失败']);
        }
    }



}
