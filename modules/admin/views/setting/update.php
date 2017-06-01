<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */

$this->title = '修改站点设置: ' . $model->sitename;
$this->params['breadcrumbs'][] = ['label' => '站点设置', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sitename, 'url' => ['view', 'id' => $model->siteid]];
$this->params['breadcrumbs'][] = '站点设置';
?>
<div class="setting-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
