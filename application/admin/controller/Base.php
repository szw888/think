<?php
namespace app\admin\controller;
use think\Controller;
use think\Loader;
class Base extends Controller
{
    /*
     * 初始化方法
     * */
    public function _initialize(){
        //判断管理员是否登录
        if(session('admin_user_session','','admin')== null || session('admin_user_session','','admin')== ''){
            $this->redirect('admin/user/login');
        }
    }
    //修改状态
    public function status(){
        $data = input('post.');
        $controller = request()->controller();

        $res = model($controller)->update(['id' => $data['cid'], 'status' => $data['status']]);
        if($res){
            $this->result(['code'=>1,'msg'=>'操作成功']);
        }else{
            $this->result(['code'=>-1,'msg'=>'操作失败']);
        }
    }

    //排序
    public function sort(){
        $data = input('post.');
        $controller = request()->controller();
        $res = model($controller)->update(['id' => $data['cid'], 'list_order' => $data['val']]);
        if($res){
            echo json_encode(['code'=>1,'msg'=>'更新成功']);
        }else{
            echo json_encode(['code'=>-1,'msg'=>'更新失败']);
        }

    }

    /*
     * 数据搜索
     *
     * */
    public function search(){
        //获取数据
        $data = input('param.');

        if(!empty($data['shop_name'])){
            $where['name'] = ['like','%'.$data['shop_name'].'%'];
        }
        if(!empty($data['category_id'])){
            $where['category_id'] = $data['category_id'];
        }
        if(!empty($data['big_price']) && !empty($data['sm_price']) && round($data['big_price']) > round($data['sm_price'])){
            $where['current_price'] = [
                ['gt',round($data['sm_price'])],
                ['lt',round($data['big_price'])]
            ];
        }
        if(!empty($data['start_time']) && !empty($data['end_time']) && strtotime($data['end_time']) > strtotime($data['start_time'])){
            $where['start_time'] = [
                ['gt',strtotime($data['start_time'])],
                ['lt',strtotime($data['end_time'])]
            ];
        }
        if(isset($data['status'])){
            $where['status']= $data['status'];
        }
        if(!isset($where)){
            $where = '';
        }
        $goodCheckData = db('Goods')->where($where)->select();
        /*获取所有分类*/
        $map = ['status'=>1,'parent_id'=>0];
        $cateData = model('Cate')->where($map)->select();
        $this->assign(
            ['goodCheckData'=>$goodCheckData,'cateData'=>$cateData]
        );
        return $this->fetch();
    }
}
