<?php

namespace app\modules\admin;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**默认访问控制器
     * @var string
     */
    public $defaultRoute='index';

    /**布局文件
     * @var string
     */
    public $layout='main.php';

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
