/**
 * Created by Administrator on 2017/5/22 0022.
 */
/**
 * var uploadType:1上传，2选择历史图片，3网络上传
 * var textClassColor:图片选中颜色属性
 * var page: 分页页码
 */
var uploadType,textClassColor='text-danger',page=0;
$(function () {
   var localUrl=window.location.href;//当前地址
    if($(".uploadimg-true").length > 0){
        var string='';
        string+=' <span class="input-group-btn upload-xz">';
        string+='<button class="btn btn-default select-img" type="button" onclick="showImageDialog(this);">选择图片</button>';
        string+='</span>';
        $(".uploadimg-true").after(string);
    }
    $("body").on('click',".yii-img",function () {
        var that=$(this).find(".glyphicon-check");
        if(that.hasClass(textClassColor) == true){
            that.removeClass(textClassColor);
        }else{
            $(".glyphicon-check").removeClass(textClassColor);
            that.addClass(textClassColor);
        }
    });

    $(".img-list").on('click',function () {
        uploadType=2;
        var imgstr='';
        var url=$("#upload-href").attr('href');
        $.post(url,{isimage:1,page:page},function (re) {
            if(re.state == 1){
                $.each(re.data,function (n,i) {
                    imgstr+='<div class="file-preview-frame krajee-default yii-img">';
                    imgstr+='<div class="kv-file-content">';
                    imgstr+='<img src="'+i.filepath+'">';
                    imgstr+='</div>';
                    imgstr+='<div class="file-actions">';
                    imgstr+='<div class="file-footer-buttons">';
                    // imgstr+='<button type="button" class="yii-file-remove btn btn-xs btn-default" title="删除文件"><i class="glyphicon glyphicon-trash"></i></button>';
                    imgstr+='<button type="button" class="yii-file-check btn btn-xs btn-default" title="选中"><i class="glyphicon glyphicon-check"></i></button>';
                    imgstr+='</div>';
                    imgstr+='<div class="clearfix"></div>';
                    imgstr+='</div>';
                    imgstr+='</div>';
                    imgstr+='</div>';
                });
                $(".file-caption-main").css('display','none');
                $(".file-preview-thumbnails").html(imgstr);
                $(".file-drop-zone-title").hide();
            }
        },'json');



    });

});
//点击上传图片
$(".img-up").on('click',function () {
    uploadType=1;
    $(".file-caption-main").css('display','table');
    $(".fileinput-remove").click();
});
/*显示上传插件*/
function showImageDialog(that) {
    uploadType=1;
    $(".upload-top").css('display','block');
}
/*关闭上传插件*/
$(".inclose").on('click',function () {
    $(".upload-top").css('display','none');
    $('#upload-file').fileinput('clear');

});
/*上传后确定赋值*/
$(".isnow").on('click',function () {
    var urls;
    switch (uploadType){
        case 1:
            urls=$(".uploadimgs").val();
            break;
        case 2:
            if($("."+textClassColor).length ==1){
                urls=$("."+textClassColor).parents('.yii-img').find('img').attr('src');
            }else{
                alert('请选择图片');
                return false;
            }
            break;
        case 3:
            break;
    }
    $(".upload-top").css('display','none');
    $(".select-img").parent().prev().val(urls)
    $(".fileinput-remove").click();
});

