<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */

$this->title = $model->sitename;
$this->params['breadcrumbs'][] = ['label' => '站点设置', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->siteid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->siteid], [
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
            'siteid',
            'sitename',
            'siteremark',
            [
               'label'=>'状态',
               'value'=>$model->status ?  '启用' :'禁用'
            ],
            'sitelink',
            [
                'label'=>'站点logo',
                'value'=>'<img witch="80px" height="80px" src="'.$model->logo.'">',
                'format' => 'html'
            ],
            'menus',
            'updatetime:datetime',
        ],
    ]) ?>

</div>
