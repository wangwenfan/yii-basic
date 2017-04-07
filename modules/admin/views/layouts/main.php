<?php
/**
 * admin模块布局
 * User: Administrator
 * Date: 2017/4/7 0007
 * Time: 14:13
 */
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use yii\helpers\Html;
AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>
<div class="container-fluid">

    
</div>
<?=$content; ?>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
