<?php
/**
 * 用户登录
 * User: Administrator
 * Date: 2017/4/7 0007
 * Time: 14:31
 */
/* @var $this \yii\web\View */
use app\assets\AppAsset;
use yii\bootstrap\Alert;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
AppAsset::register($this);
$this->title='登录';
AppAsset::addCss($this,'admin/css/login.css');
AppAsset::addJs($this,'admin/js/Particleground.js');
AppAsset::addJs($this,'admin/js/verificationNumbers.js');

$loginCss="
body{height:100%;background:#16a085;overflow:hidden;}
    canvas{z-index:-1;position:absolute;}";
$loginJs = "    
$(document).ready(function() {
    //粒子背景特效
    $('body').particleground({
     dotColor: '#5cbdaa',
     lineColor: '#5cbdaa'
  });
});";
$this->registerJs($loginJs);
$this->registerCss($loginCss);
if( Yii::$app->getSession()->hasFlash('success') ) {
 echo Alert::widget([
     'options' => [
         'class' => 'alert-success ', //这里是提示框的class
     ],
     'body' => Yii::$app->getSession()->getFlash('success'), //消息体
 ]);
}
if( Yii::$app->getSession()->hasFlash('error') ) {
 echo Alert::widget([
     'options' => [
         'class' => 'alert-danger',
     ],
     'body' => Yii::$app->getSession()->getFlash('error'),
 ]);
}

?>
<?php $this->beginPage(); ?>
<!doctype html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport"
       content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title><?= Html::encode($this->title) ?></title>
 <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>
<dl class="admin_login">
 <dt>
  <strong>站点后台管理系统</strong>
  <em>Management System</em>
 </dt>
 <?php $form=ActiveForm::begin([
     'action'=>'',
     'method'=>'post',
     'options'=>['class'=>'form-horizontal']
 ]);?>
 <?=$form->field($model,'username')->label('用户名');?>
 <?=$form->field($model,'password')->passwordInput()->label('密码');?>
 <?= $form->field($model, 'rememberMe')->checkbox(); ?>
 <?=\yii\helpers\Html::submitButton('登录',['class'=>'btn btn-default'])?>
 <?php ActiveForm::end(); ?>
</dl>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>






