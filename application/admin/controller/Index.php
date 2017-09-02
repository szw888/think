<?php
namespace app\admin\controller;
use think\Controller;
use PHPMailer\Email;
class Index extends Controller
{
    public function index()
    {
        $email = new Email();
        $email->send('1','1','1');
        exit;
        return $this->fetch();
    }
}
