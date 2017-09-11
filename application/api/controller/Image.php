<?php
namespace app\api\controller;

use think\Controller;
use think\File;
use think\Request;


class Image extends Controller{
    public function uploader(){
       $file = Request::instance()->file('file');
       $info = $file->move('upload');

       if($info && $info->getFilename()){
           return dataBack('1','success','/'.$info->getPathname());
       }else{
           return dataBack('-1','error');
       }
    }
}
?>