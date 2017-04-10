<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/7 0007
 * Time: 14:11
 */
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title='新增栏目';
?>
<!-- 左侧导航start -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li >
            <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> 首页</a>
        </li>
        <li class="active">
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> 内容管理 <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li class="active">
                    <a href="#">栏目列表</a>
                </li>
                <li>
                    <a href="#">文章列表</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> 评论</a>
        </li>
    </ul>
</div>
</nav>
<!-- /左侧导航end -->

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    内容管理
                </h1>
            </div>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">内容管理</a>
                </li>
                <li class="active">
                    <i class="fa fa-table"></i> <?=$this->title;?>
                </li>
            </ol>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <? $form=ActiveForm::begin([
                    'action'=>'',
                    'method'=>'post',
                    'options'=>['class'=>'form-horizontal']
                ]); ?>
                <?=$form->field($model,'catname');?>
                <?=$form->field($model,'description');?>
                <?=\yii\helpers\Html::submitButton('提交',['class'=>'btn btn-primary']); ?>
                <? ActiveForm::end(); ?>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
