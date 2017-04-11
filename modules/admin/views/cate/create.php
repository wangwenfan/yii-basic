<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/7 0007
 * Time: 14:11
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->params['breadcrumbs'][] = ['label' => '栏目列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="container-fluid">
        <h1><?= Html::encode($this->title) ?></h1>
        <div class="row">
            <div class="col-lg-6">
                <? $form=ActiveForm::begin([
                    'action'=>'',
                    'method'=>'post',
                    'options'=>['class'=>'form-horizontal']
                ]); ?>
                <?=$form->field($model,'catname');?>
                <?=$form->field($model,'description');?>
                <?= Html::submitButton('提交',['class'=>'btn btn-primary']); ?>
                <? ActiveForm::end(); ?>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
