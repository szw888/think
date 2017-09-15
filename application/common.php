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
        $str = '审核已通过，如需登录商户后台，请点击链接<a href = "'.request()->domain().'/bis/Login/index.html"> http://www.think.com/bis/Login/index.html </a>'.request()->domain().'进入';  //status = 1
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
        $cityData = model('City')->get(['id'=>$sc_id]);
        return $cityData['city_name'];
    }else{
        return '';
    }

}

function getSeCate($cate_path){
    if(empty($cate_path)){
        return '';
    }
    if(preg_match('/,/',$cate_path)){
        $res = explode(',',$cate_path);
        $sc_id = $res[1];
        if(empty($sc_id)){
            return '';
        }
        $cate_id = explode('|',$sc_id);
        $res = model('Cate')->all($cate_id);
        foreach($res as $key=>$val){
            return "<input type = 'checkbox' checked = 'checked' id = 'cat[".$key."]'/><label for = 'cat[".$key."]'>$val->cate_name</label>";
        }
    }
}