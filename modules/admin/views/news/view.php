<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="container-fluid">
        <div class="news-view">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>
                <?= Html::a('修改', ['update', 'id' => $model->news_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('删除', ['delete', 'id' => $model->news_id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => '确定要删除这条数据吗?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'news_id',
                    [
                        'label' => '栏目名',
                        'value' => $model->findCateName()->catname
                    ],
                    'title',
                    'description',
                    'content:ntext',
                    'inputtime:datetime',
                    [
                        'label' => '状态',
                        'value' => $model->status == 1 ? '启用' : '禁用'
                    ]
                ],
            ]) ?>

        </div>
    </div>
</div>
