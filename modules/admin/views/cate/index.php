<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/7 0007
 * Time: 14:11
 */
/* @var $dataProvider app\modules\admin\controllers\CateController */
use yii\grid\GridView;
use yii\helpers\Url;

$this->title='栏目列表';
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
            <a href="<?= Url::to('create') ?>"><button type="button" class="btn btn-primary pull-right">新增栏目</button></a>
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

      <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'attribute' => '栏目ID',
                    'content' => function($dataProvider){
                      return $dataProvider->catid;
                    }
                ],
                [
                    'attribute' => '栏目名称',
                    'content' => function($dataProvider){
                        return $dataProvider->catname;
                    }
                ],
                [
                    'attribute' => '添加时间',
                    'content' => function($dataProvider){
                        return date('Y-m-d H:i:s',$dataProvider->inputtime);
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => '操作',
                    'headerOptions' => ['width' => '128', 'class' => 'padding-left-5px',],
                ],
            ]
        ]);

      ?>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
