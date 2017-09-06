<?php
namespace app\index\controller;


class Index
{
    public function index()
    {
       $res = \Map::getStaticmapBySpot('河南省郑州市金水区东风路信息学院路小铺新区26号');
       file_put_contents('map.png',$res);
   }
}
