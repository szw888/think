<?php
namespace app\admin\controller;
use think\Loader;
use think\Request;
class Recommend extends Base
{

    public function index(){
        $data = model('Recommend')->order('list_order')->select();
        //获取recommend.php中的配置信息
        $recData = config('recommend.rec');
        return $this->fetch('',['data'=>$data,'recData'=>$recData]);
    }
    /*
     * 推荐位添加  type:post
     * return string
     * */
    public function add()
    {
        //配置文件中获取推荐位数据
        $recData = config('recommend.rec');
        if(request()->isPost()){
            //获取数据
            $data = input('post.');
            //验证数据
            $validate = Loader::validate('Recommend');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $res = model('Recommend')->add($data);
            if($res){
                $this->success('添加成功','admin/Recommend/index');
            }else{
                $this->error('添加失败');
            }

        }
        return $this->fetch('',['recData'=>$recData]);
    }

    /*
     * 推荐位编辑  type:post
     * @param  $rid   推荐位ID
     * return string
     * */
    public function edit()
    {
        //配置文件中获取推荐位数据
        $recData = config('recommend.rec');
        $rid = input('param.rid');
        $saveData = model('Recommend')->get($rid);

        if(request()->isPost()){
            //获取数据
            $data = input('post.');

            //验证数据
            $validate = Loader::validate('Recommend');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            //更新数据
            $res = model('Recommend')->save($data);
            if($res !== false){
                $this->success('修改成功','Recommend/index');
            }else{
                $this->error('修改失败');
            }


        }
        return $this->fetch('',['recData'=>$recData,'saveData'=>$saveData]);
    }


}
