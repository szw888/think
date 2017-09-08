<?php
namespace app\admin\model;
use think\Model;

class Base extends Model{
    //数据的添加
    public function add($data){
        $data['status'] = 1;
        return $this->save($data);
    }
    //通过一级的 id 获取二级数据
    public function getSecondByfirst($firstId){
        $where = [
            'parent_id'    =>$firstId,
            'status'=>1
        ];
        $res = $this->where($where)->select();
        return $res;
    }
    //获取分类层级树
    public function getTree()
    {
        $cateData = $this->where(array('status'=>array('neq',-1)))->order('list_order')->select();
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
?>