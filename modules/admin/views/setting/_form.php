<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form col-lg-8">

    <?php $form = ActiveForm::begin([
        'action'=>'',
        'method'=>'post',
    ]); ?>

    <?= $form->field($model, 'sitename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'siteremark')->textInput(['maxlength' => true]) ?>
    <? if($model->status == null){ $model->status=1;} ?>
    <?= $form->field($model, 'status')->radioList(['1'=>'启用','0'=>'禁用']) ?>

    <?= $form->field($model, 'logo')->textInput(['maxlength' => true,'class'=>'form-control uploadimg-true']) ?>
    <?= $form->field($model, 'backgroundurls')->textInput(['maxlength' => true,'class'=>'form-control uploadimg-true']) ?>
    <?= $form->field($model, 'sitelink')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'menus')->textarea(['maxlength' => true,'rows'=>5,'placeholder'=>'格式如：菜单名|地址 多个请换行']) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
