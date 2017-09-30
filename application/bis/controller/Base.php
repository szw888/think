<?php
namespace app\bis\controller;

use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {
        if(!session('bis_user_session','','bis')){

            $this->redirect('login/index');
        }
    }
}
