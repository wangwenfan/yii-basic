<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/7 0007
 * Time: 14:11
 */
/* @var $dataProvider app\modules\admin\controllers\CateController */
use yii\grid\GridView;
use yii\helpers\Html;
$this->title = '栏目列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <h1><?= Html::encode($this->title = '栏目列表') ?></h1>

    <p>
        <?= Html::a('新增栏目', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn'
            ],
            [
                'attribute' => '栏目ID',
                'content' => function ($dataProvider) {
                    return $dataProvider->catid;
                }
            ],
            [
                'attribute' => '栏目名称',
                'content' => function ($dataProvider) {
                    return $dataProvider->catname;
                }
            ],
            [
                'attribute' => '添加时间',
                'content' => function ($dataProvider) {
                    return date('Y-m-d H:i:s', $dataProvider->inputtime);
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
