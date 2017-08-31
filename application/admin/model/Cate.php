<?php
//分类模块
namespace app\admin\model;
use think\Model;

class Cate extends Model
{

    //数据的添加
    public function add($data){
        $data['status'] = 1;
        return $this->save($data);
    }
    //获取分类层级树
    public function getTree()
    {
        $cateData = $this->order('list_order')->select();
        return $this->_getTree($cateData,$pid = 0,$level = 0);
    }
    private function _getTree($data,$pid,$level){
        static $arr = array();
        foreach($data as $k=>$v){
            if($v['parent_id']==$pid){
                $v['level'] = $level;
                $arr[] = $v;
                $this->_getTree($data,$v['id'],$level+1);
            }
        }
       return $arr;
    }

}
