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

<!--            --><?//= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(), [
//                'clientOptions' => [
//                    'imageManagerJson' => ['/redactor/upload/image-json'],
//                    'lang' => 'zh_cn',
//                    'minHeight' => '300px',
//                ]
//            ]) ?>
            <?=Html::activeHiddenInput($model,'thumb',['class'=>'inputThumb'])?>
            <?=$form->field($fmodel, 'file')->widget(FileInput::classname(), [
                'options' => ['multiple' => true],
                'pluginOptions' => [
                    // 需要预览的文件格式
                    'previewFileType' => 'image',
                    // 是否展示预览图
                    'initialPreviewAsData' => true,
                    // 异步上传的接口地址设置
                    'uploadUrl' => Url::toRoute(['upload/uplodfile']),
                    'uploadAsync' => true,
                    // 最少上传的文件个数限制
                    'minFileCount' => 1,
                    // 最多上传的文件个数限制
                    'maxFileCount' => 2,
                 ],
                 //事件行为
                'pluginEvents'  => [
                    'fileuploaded'  =>
                        "function (object,data){
                             $(\".inputThumb\").val(data.response.imageUrl);  

                            }",
                    //错误的冗余机制
                    'error' => "function (){
                            alert('图片上传失败');
                        }"
                ]
            ]); ?>

            <?= Markdowneditor::widget(['model' => $model, 'attribute' => 'content']) ?>

            <?= $form->field($model, 'status')->radioList(['1'=>'启用','0'=>'禁用'])?>

            <div class="form-group">
                <?= Html::submitButton('提交', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
