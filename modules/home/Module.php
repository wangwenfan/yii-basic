<?php

namespace app\modules\home;

/**
 * home module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\home\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        //语言设置为中文
        \Yii::$app->language='zh-CN';
    }
}
