<?php
namespace app\admin\controller;
use phpmailer\email;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $email = new Email();
        $email->send('1','1','1');

        return $this->fetch();
    }
}
