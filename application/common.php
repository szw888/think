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
function doCurl($url,$type=0,$data=''){
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


function send($to,$title,$body){
    vendor('phpmailer.phpmailer');
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码
    $mail->SMTPAuth   = true;                  //开启认证
    $mail->Port       = 25;
    $mail->Host       = "smtp.qq.com";
    $mail->Username   = "1418712841@qq.com";
    $mail->Password   = "qsunouynlptdicbf";
    //$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现“Could  not execute: /var/qmail/bin/sendmail ”的错误提示
    $mail->AddReplyTo("1418712841@qq.com","mckee");//回复地址
    $mail->From       = "1418712841@qq.com";
    $mail->FromName   = "1418712841@qq.com";
    $to = "s15838257347@126.com";
    $mail->AddAddress($to);
    $mail->Subject  = "phpmailer测试标题";
    $mail->Body = "<h1>phpmail演示</h1>这是php点点通（<font color=red>www.phpddt.com</font>）对phpmailer的测试内容";
    $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略
    $mail->WordWrap   = 80; // 设置每行字符串的长度
    //$mail->AddAttachment("f:/test.png");  //可以添加附件
    $mail->IsHTML(true);

    $aa = $mail->Send();
    echo '邮件已发送';
    exit($aa);
}