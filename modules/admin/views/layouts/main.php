<?php
/**
 * admin模块布局
 * User: Administrator
 * Date: 2017/4/7 0007
 * Time: 14:13
 */
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
AppAsset::register($this);
AppAsset::addCss($this,'admin/css/sb-admin.css');
AppAsset::addCss($this,'admin/css/plugins/morris.css');
AppAsset::addCss($this,'admin/font-awesome/css/font-awesome.min.css');
AppAsset::addJs($this,'admin/js/plugins/morris/raphael.min.js');
?>
<?php $this->beginPage();?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?=Url::to(['index/index'])?>">后台管理</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=Yii::$app->user->identity->username ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?= Url::to(['index/logout']); ?>"><i class="fa fa-fw fa-power-off"></i>退出</a>
                    </li>
                </ul>
            </li>
        </ul>
        <?php
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
        <!-- 左侧导航start -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li >
                    <a href="<?=Url::to(['index/index'])?>"><i class="fa fa-fw fa-dashboard"></i> 首页</a>
                </li>
                <li class="active">
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-file"></i> 内容管理 <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo" class="collapse">
                        <li class="active">
                            <a href="<?=Url::to(['cate/index'])?>">栏目列表</a>
                        </li>
                        <li>
                            <a href="<?=Url::to(['news/index'])?>">文章列表</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href=""><i class="fa fa-fw fa-arrows-v"></i> 评论</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /左侧导航end -->

    <div id="page-wrapper">
        <!--面包屑 start-->
        <?= Breadcrumbs::widget([
            'tag' => 'ol',
            'homeLink' => [
                'label' => '后台首页',
                'url' => Url::to(['index/index']),
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <!--面包屑 end-->
    <?=$content; ?>
</div>
<!-- /#wrapper -->

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
