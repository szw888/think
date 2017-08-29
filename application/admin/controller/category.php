<?php
namespace app\admin\controller;
use think\Controller;
class category extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}
