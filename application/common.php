<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件


/*
 * CURL函数
 * param $url  请求地址
 * param $type 请求类型   0：get 1:post
 * param $data 请求参数
 * */
function doCurl($url,$type=0,$data=[]){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_HEADER,0);
    if($type==1){
        curl_setopt($ch,CURLOPT_PORT,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    }
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
/*
 * 数据返回
 * param $code  状态
 * param $msg   返回信息
 * param $data  返回数据
 * */
function dataBack($code,$msg,$data=''){
    return [
        'code'=>$code,
        'msg' =>$msg,
        'data'=>$data,
    ];
}
/*
 * 商户入驻申请的提示信息
 * param $status  状态
 * return string
 * */
function stringBack($status){

    if($status== 1){
        $loginurl = request()->domain().'/bis/Login/index';
        $str = '审核已通过，如需登录商户后台，请点击链接<a href = "'.$loginurl.'"> '.$loginurl.' </a>进入';  //status = 1
    }elseif($status == 0){
        $str = '正在审核中,审核后平台方会发送邮件通知，请您耐心等待……';   //status = 0
    }elseif($status == 2){
        $str = '非常抱歉，您提交的申请不符合条件，请重新提交';   //status = 2
    }else{
        $str = '该申请已被删除'; //status = -1
    }
    return $str;
}

/*
 * 通过id 获取二级分类名称
 * param $city_path  分类path
 * return  string  name
 * */
function getSecondName($city_path){
    if(empty($city_path)){
        return '';
    }

    if(preg_match('/,/',$city_path)){
        $res = explode(',',$city_path);
        $sc_id = $res[1];
        $cityData = model('admin/City')->get(['id'=>$sc_id]);
        return $cityData['city_name'];
    }else{
        return '';
    }

}


/* 通过分类id 获取分类信息
 * @param $cateid   分类id
 * return string
 * */
function getCateInfoById($cateid){
    if(!empty($cateid) && is_numeric($cateid)){
        $res = model('admin/Cate')->field('cate_name')->find($cateid);
        return $res['cate_name'];
    }
}

/* 通过分类path 获取分类信息
 * @param $cateid   分类path
 * return string
 * */
function getSeCate($cate_path){
    $checkbox = '';
    if($cate_path && preg_match('/,/',$cate_path)){
        $arr = explode(',',$cate_path);

        foreach($arr as $k=>$v){
            $res = model('admin/cate')->field('cate_name')->where('id',$v)->find();
            $checkbox .= "<input type = 'checkbox' checked = 'checked'/> &nbsp; ".$res['cate_name']." &nbsp; ";
        }

    }else if(!empty($cate_path) && !preg_match('/,/',$cate_path)){
        $res = model('admin/cate')->field('cate_name')->where('id',$cate_path)->find();
        $checkbox = "<input type = 'checkbox' checked = 'checked'/> &nbsp; ".$res['cate_name']." &nbsp; ";
    }
    return $checkbox;
}


/*
 * 通过城市路径获取对应的城市名称
 * @param  $cityPath   string
 * reutrn string
 * */
function getCityPathById($cityPath){
   if($cityPath && preg_match('/,/',$cityPath)){
       $arr = explode(',',$cityPath);

       $res = model('admin/City')->field('city_name')->where('id',$arr[0])->find();
       $select = "<select class = 'form-control1' style= 'width:30%;'>";
       $select .= "<option>".$res['city_name']."</option>";
       $select .= "</select>";

       $res2 = model('admin/City')->field('city_name')->where('id',$arr[1])->find();
       $select2 = "<select class = 'form-control1' style= 'width:30%;'>";
       $select2 .= "<option>".$res2['city_name']."</option>";
       $select2 .= "</select>";


       return $select.$select2;
   }
}


/*
 * 获取团购商品所支持的门店
 * @param  $location_id   门店id  string
 * return string
 * */
function getStoreByIds($location_id){
    if($location_id && preg_match('/,/',$location_id)){
        $arr = explode(',',$location_id);
        $checkbox = '';
        foreach($arr as $k=>$v){
            $res = model('admin/location')->field('location_name')->where('id',$v)->find();
            $checkbox .= "<input type = 'checkbox' checked = 'checked'/> &nbsp; ".$res['location_name']." &nbsp; ";
        }

    }else{
        $res = model('admin/location')->field('location_name')->where('id',$location_id)->find();
        $checkbox = "<input type = 'checkbox' checked = 'checked'/> &nbsp; ".$res['location_name']." &nbsp; ";
    }
    return $checkbox;
}



