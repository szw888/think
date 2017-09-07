/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 17-8-31
 * Time: 下午6:14
 * To change this template use File | Settings | File Templates.
 */
function confim(){
    if(confirm('确定要执行此操作吗？')){
        return true;
    }else{
        return false;
    }
}
/*
 * 通过id 获取子类的数据
 * @param  firstId  父类id
 * @param  type     类型  1=城市  2=生活分类
 * */
function getSecond(firstId,type){
    $.ajax({
        url:$url,
        type:'post',
        dataType:'json',
        data:{'firstId':firstId,'type':type},
        success:function(res){
            $data = res.data;
            if(type==1){
                if($data.code==1){
                    $cityData = $data.data;
                    $option = '';
                    $.each($cityData, function(index,val) {
                        $option += "<option value = "+val['id']+">"+val['city_name']+"</option>";
                    });
                    $('#secondCity').html($option);
                }else{
                    $('#secondCity').html('<option value = "">----请选择----</option>');
                }
            }else{
                if($data.code==1){
                    $cityData = $data.data;
                    $option = '';
                    $.each($cityData, function(index,val) {
                        $option += "<option value = "+val['id']+">"+val['cate_name']+"</option>";
                    });
                    $('#secondCate').html($option);
                }else{
                    $('#secondCate').html('<option value = "">----请选择----</option>');
                }
            }


        }
    })
}