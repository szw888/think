$(function() {

    $("#file_upload").uploadify({
        'swf'             : $uploadify_swf,
        'uploader'        : $uploadify_uploader,
        'fileTypeDesc'              :'Image files',
        'buttonText'              :'图片上传',
        'fileObjName'              :'file',
        'fileTypeExts'              :'*.git;*.jpg;*.png',
        'onUploadSuccess' : function(file, data, response) {

            if(response){
                $obj = JSON.parse(data);
                $('#litpic').attr('src',$obj.data);
                $('#pathName_litpic').attr('value',$obj.data);
            }
        }
    });

    $("#license").uploadify({
        'swf'             : $uploadify_swf,
        'uploader'        : $uploadify_uploader,
        'buttonText'              :'图片上传',
        'fileTypeDesc'              :'Image files',
        'fileObjName'              :'file',
        'fileTypeExts'              :'*.git;*.jpg;*.png',
        'onUploadSuccess' : function(file, data, response) {
            if(response){
                $obj = JSON.parse(data);
                $('#license_img').attr('src',$obj.data);
                $('#license_path').attr('value',$obj.data);
            }
        }
    });
});