<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/7 0007
 * Time: 14:11
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title=$model->catname;
$this->params['breadcrumbs'][] = ['label' => '栏目列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="container-fluid">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a('修改', ['update', 'id' => $model->catid], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('删除', ['delete', 'id' => $model->catid], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '确定要删除这条数据吗?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <div class="row">
            <div class="col-lg-6">
                <? echo DetailView::widget([
                   'model' => $model,
                    'attributes' => [
                        [
                            'label' => '栏目ID',
                            'value' =>  $model->catid
                        ],
                        'catname',
                        'description:html',
                        [
                            'label' => '添加时间',
                            'value' =>Yii::$app->formatter->asDate($model->inputtime,'yyyy-MM-dd'),
                        ]
                    ]
                ]); ?>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
