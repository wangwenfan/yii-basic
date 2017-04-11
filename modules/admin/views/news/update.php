<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = '更新标题: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->news_id]];
$this->params['breadcrumbs'][] = '修改';
?>
    <div class="container-fluid">
<div class="news-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'catRe' => $catRe
    ]) ?>

</div>
    </div>
</div>
