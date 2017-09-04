<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        \phpmailer\phpmailer\Email::sendmail('s15838257347@126.com','服务器测试邮件发送','发送成功');
        return $this->fetch();
    }
}
