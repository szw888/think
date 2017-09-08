$(function() {

    $("#file_upload").uploadify({
        'swf'             : $uploadify_swf,
        'uploader'        : $uploadify_uploader,
        'fileTypeDesc'              :'Image files',
        'fileObjName'              :'file',
        'fileTypeExts'              :'*.git;*.jpg;*.png',
        'onUploadSuccess' : function(file, data, response) {
            alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
        }
    });
});