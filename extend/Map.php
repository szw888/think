<?php
/*百度地图业务的封装*/
class Map{
    /*
     * 通过地址获取经纬度
     * @param  $address   字符串地址
     * return array
     * */

    public static function getLLByAddress($address){
        //http://api.map.baidu.com/geocoder/v2/?callback=renderOption&output=json&address=百度大厦&city=北京市&ak=您的ak
        $data = [
            'address'=>$address,
            'output'=>'json',
            'ak'=>'Wkg5A1ez95rTUkHSWg5Gnb5I0h8hqKQi'
        ];
        $param = http_build_query($data);
        $url = "http://api.map.baidu.com/geocoder/v2/?".$param;
        $res = doCurl($url);
        if($res){
            return json_decode($res,true);
        }else{
            return [];
        }
    }
}
?>