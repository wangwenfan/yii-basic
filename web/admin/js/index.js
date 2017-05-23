/**
 * Created by Administrator on 2017/5/22 0022.
 */
var self;
$(function () {
   var localUrl=window.location.href;//当前地址
});
/*显示上传插件*/
function showImageDialog(that) {
    self=$(that);
    $(".upload-top").css('display','block');

}
/*关闭上传插件*/
$(".inclose").on('click',function () {
    $(".upload-top").css('display','none');
    $('#upload-file').fileinput('clear');

});
/*上传后确定赋值*/
$(".isnow").on('click',function () {
    self.parent().prev().val($(".uploadimgs").val());
    $(".upload-top").css('display','none');
     $('#upload-file').fileinput('clear');
});

