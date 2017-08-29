<?php
namespace app\admin\controller;
use think\Controller;
class Cate extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}
