<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = '新增文章';
$this->params['breadcrumbs'][] = ['label' => '文章列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="container-fluid">
<div class="news-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'catRe' => $catRe,
        'tnModel' => $tnModel,
        'tagRe' => $tagRe,
        'taglist'=> ''
    ]) ?>
</div>
</div>
