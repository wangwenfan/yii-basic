<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tag */

$this->title = '修改标签: ' . $model->tagname;
$this->params['breadcrumbs'][] = ['label' => '标签', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tagname, 'url' => ['view', 'id' => $model->tag_id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="tag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
