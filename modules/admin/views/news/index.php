<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchNews */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章列表';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="container-fluid">

    <h1><?= Html::encode($this->title='文章列表') ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增文章', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'class'=>'yii\grid\CheckboxColumn'
            ],
            'news_id',
            [
                'label'=>'栏目名',
                'attribute' => 'catid',
                'content' => function($dataProvider){
                    return \app\models\Cate::findOne(['catid'=>$dataProvider->catid])->catname;
                }
            ],
            'title',
            'description',
//            'content:ntext',
            [
                'label'=>'添加时间',
                'attribute' => 'inputtime',
                'content' => function($dataProvider){
                    return Yii::$app->formatter->asDate($dataProvider->inputtime,'yyyy-MM-dd');
                }
            ],
            [
                'label'=>'状态',
                'attribute' => 'status',
                'content' => function($dataProvider){
                    return $dataProvider->status == 1 ? '启用' : '禁用';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
</div>
