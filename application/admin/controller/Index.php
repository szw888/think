<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $aa = \phpmailer\email::send('1','1','1');

        return $this->fetch();
    }
}
