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
//批量删除
$indexJs='
    $(".gridview").on("click", function () {
        var keys = $("#grid").yiiGridView("getSelectedRows");
         if(keys == ""){
         alert("请选择文章"); return false;
         }
         if(!confirm("确定要删除吗")) return false;
        $.post("deleteall.html?id="+(keys),function(re){
              if(re.state == 1){
                 window.location.reload();//刷新当前页面.
              }else{
                alert(re.info);
              }
        },"json");
    });
';
$this->registerJs($indexJs);

?>
    <div class="container-fluid">
    <h1><?= Html::encode($this->title='文章列表') ?></h1>
    <?php Pjax::begin(); ?>
<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p class="index-table">
        <?= Html::a('新增文章', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('批量删除', "javascript:void(0);", ['class' => 'btn btn-success gridview']) ?>
    </p>

    <?= GridView::widget([
        'id' => 'grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'class'=>'yii\grid\CheckboxColumn',
                'name' => 'id'
            ],
            'news_id',
            [
                'label'=>'栏目名',
                'attribute' => 'catid',
                'content' => function($dataProvider){
                      return $dataProvider->cat->catname;
                }
            ],
            'title',
            'description',
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
