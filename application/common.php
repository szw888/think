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
        $str = '审核已通过';
    }elseif($status == 0){
        $str = '正在审核中,审核后平台方会发送邮件通知，请您耐心等待……';
    }elseif($status == 2){
        $str = '非常抱歉，您提交的申请不符合条件，请重新提交';
    }else{
        $str = '该申请已被删除';
    }
    return $str;
}
