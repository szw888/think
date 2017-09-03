<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        vendor('phpmailer.Email');
        $email = new Email();
        $email->send('1','1','1');

        return $this->fetch();
    }
}
