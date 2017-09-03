<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $a = send('2','2','2');
        dump($a);exit;
        return $this->fetch();
    }
}
