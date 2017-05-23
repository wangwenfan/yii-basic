<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">

    <?php $form = ActiveForm::begin([
        'action'=>'',
        'method'=>'post',
    ]); ?>

    <?= $form->field($model, 'sitename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'siteremark')->textInput(['maxlength' => true]) ?>
    <? if($model->status === null){ $model->status=1;} ?>
    <?= $form->field($model, 'status')->radioList(['1'=>'启用','0'=>'禁用']) ?>

    <div class="input-group ">
        <input type="text" name="logo" value="" class="form-control">
        <span class="input-group-btn">
				<button class="btn btn-default" type="button" onclick="showImageDialog(this);">选择图片</button>
        </span>
    </div>

    <?= $form->field($model, 'sitelink')->textInput(['maxlength' => true]) ?>
    <?=Html::activeHiddenInput($model,'logo',['class'=>'inputThumb'])?>
    <?= $form->field($model, 'menus')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
