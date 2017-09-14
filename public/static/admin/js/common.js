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
                $checkout = '';
                $.each($cateData, function(index,val) {
                    $checkout += " <input id = 'checkcate' name = 'category_se_id[]' value = '"+val.id+"' type = 'checkbox' /> ";
                    $checkout += " <label for = 'checkcate'>"+ val.cate_name +"</label>"
                });
                $('#secondCate').html($checkout);
            }else{
                $('#secondCate').html('');
            }

        }
    })
}

/***********排序************/
function updateSort(cid,val){

    $.ajax({
        url:$changeSortUrl,
        dataType:'json',
        type:'post',
        data:{'cid':cid,'val':val},
        success:function(res){
            if(res.code==1){
                alert(res.msg);
                location.reload();
            }else{
                alert(res.msg);
            }
        }
    });
}
/***********修改状态*************/

function status($cid, $status) {

    if(confim()) {
        $.ajax({
            url: $changeStatusUrl,
            dataType: 'json',
            type: 'post',
            data: {'cid': $cid, 'status': $status},
            success: function (res) {
                if (res.code == 1) {
                    alert(res.msg);
                    location.reload();
                } else {
                    alert(res.msg);
                }
            }
        });
    }
}