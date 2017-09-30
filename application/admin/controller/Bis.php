<?php
namespace app\admin\controller;
use think\Controller;
use think\Loader;
class Bis extends Base
{
    //商户审核----列表
    public function apply()
    {
        header("Content-type: text/html; charset=utf-8");
        $applyData = model('Bis')->where('status',0)->order('id desc')->paginate(3);
        $this->assign('applyData',$applyData);
        return $this->fetch();
    }
    //商户----列表
    public function index()
    {
        header("Content-type: text/html; charset=utf-8");
        $succData = model('Bis')->where('status',1)->order('id desc')->paginate(3);
        $this->assign('succData',$succData);
        return $this->fetch();
    }
    //修改状态
    public function status(){
        $data = input('post.');
        $Bisres = model('Bis')->update(['id' => $data['cid'], 'status' => $data['status']]);
        $Locres = model('Location')->save(['status'  => $data['status'],],['bis_id' => $data['cid']]);
        $Accres = model('Account')->save(['status'  => $data['status'],],['bis_id' => $data['cid']]);
        if($Bisres && $Locres && $Accres){
            $url = request()->domain().url('bis/register/checking',['id'=>$data['cid']]);
            \phpmailer\phpmailer\Email::sendmail('s15838257347@126.com','B2B商户入驻申请通知','您申请的入驻B2B商户已审核，请点击<a href = "'.$url.'" target="_blank">查看链接</a>查看审核状态');
            $this->result(['code'=>1,'msg'=>'操作成功']);
        }else{
            $this->result(['code'=>-1,'msg'=>'操作失败']);
        }
    }
    //商户详情页
    public function detail(){
        //获取一级城市
        $firstCity = model('admin/City')->where('parent_id','0')->select();
        //获取一级分类
        $firstCate = model('admin/Cate')->where('parent_id','0')->select();

        $bisId = input('param.bid');
        if(empty($bisId)){
            return '参数错误';
        }
        $bisData = model('Bis')->find($bisId);
        $locationData = model('Location')->get(['bis_id'=>$bisId]);
        $accountData = model('Account')->get(['bis_id'=>$bisId]);
        $this->assign(
            [
                'firstCity'=>$firstCity,
                'firstCate'=>$firstCate,
                'bisData'=>$bisData,
                'locationData'=>$locationData,
                'accountData'=>$accountData,
            ]
        );
        return $this->fetch();
    }



}
