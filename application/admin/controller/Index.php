<?php
namespace app\admin\controller;
use phpmailer;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $email = new email();
        $email->send('1','1','1');

        return $this->fetch();
    }
}
