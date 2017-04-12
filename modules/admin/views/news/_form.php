<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use ijackua\lepture\Markdowneditor;
use ijackua\lepture\MarkdowneditorAssets;
/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
//MarkdowneditorAssets::register($this);
?>
<div class="row">
    <div class="col-lg-8">
        <div class="news-form">
            <?php $form = ActiveForm::begin([
                    'action'=>'',
                    'method'=>'post',
                    'options'=>['class'=>'form-horizontal']
                ]); ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'catid')->dropDownList($catRe, ['prompt'=>'请选择','style'=>'width:200px']) ?>

            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(), [
                'clientOptions' => [
                    'imageManagerJson' => ['/redactor/upload/image-json'],
                    'lang' => 'zh_cn',
                    'minHeight' => '300px',
                ]
            ]) ?>
<!--            --><?//= Markdowneditor::widget(['model' => $model, 'attribute' => 'content']) ?>

            <?= $form->field($model, 'status')->radioList(['1'=>'启用','0'=>'禁用'])?>

            <div class="form-group">
                <?= Html::submitButton('提交', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
