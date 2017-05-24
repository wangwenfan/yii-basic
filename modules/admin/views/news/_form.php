<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use ijackua\lepture\Markdowneditor;
use ijackua\lepture\MarkdowneditorAssets;
/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $fmodel app\models\Upload */
/* @var $form yii\widgets\ActiveForm */
MarkdowneditorAssets::register($this);
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
            <?= $form->field($tnModel,'tag_id[]')->checkboxList($tagRe,['value'=>$taglist])->label('文章标签'); ?>
            <?= $form->field($model, 'thumb')->textInput(['maxlength' => true,'class'=>'form-control uploadimg-true']) ?>
            <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(), [
                    'clientOptions' => [
                        'imageManagerJson' => ['/redactor/upload/image-json'],
                        'lang' => 'zh_cn',
                        'minHeight' => '300px',
                    ]
                ]) ?>

<!--            --><?//= $form->field($model,'content')->widget('yidashi\markdown\Markdown',['language' => 'zh']); ?>
            <?= $form->field($model, 'status')->radioList(['1'=>'启用','0'=>'禁用'])?>
            <div class="form-group">
                <?= Html::submitButton('提交', ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
