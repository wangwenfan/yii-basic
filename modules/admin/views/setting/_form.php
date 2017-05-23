<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form col-lg-8">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sitename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'siteremark')->textInput(['maxlength' => true]) ?>
    <? if($model->status == '') $model->status = 1; ?>
    <?= $form->field($model, 'status')->radioList(['1'=>'启用','0'=>'禁用']) ?>

    <?= $form->field($model, 'sitelink')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menus')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
