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
 * 通过id 获取子类的数据   城市
 * @param  firstId  父类id
 * */
function getSecondCity(firstId){
    $.ajax({
        url:$cityurl,
        type:'post',
        dataType:'json',
        data:{'firstId':firstId},
        success:function(res){
            $data = res.data;
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

        }
    })
}

/*
 * 通过id 获取子类的数据   分类
 * @param  firstId  父类id
 * */
function getSecondCate(firstId){
    $.ajax({
        url:$cateurl,
        type:'post',
        dataType:'json',
        data:{'firstId':firstId},
        success:function(res){
            $data = res.data;
            if($data.code==1){
                $cateData = $data.data;
                $option = '';
                $.each($cateData, function(index,val) {
                    $option += "<option value = "+val['id']+">"+val['cate_name']+"</option>";
                });
                $('#secondCate').html($option);
            }else{
                $('#secondCate').html('<option value = "">----请选择----</option>');
            }

        }
    })
}