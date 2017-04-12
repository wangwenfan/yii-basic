<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/12 0012
 * Time: 14:12
 */

namespace app\modules\home\controllers;
use yii\rest\ActiveController;
use app\models\News;
class UserController extends ActiveController
{
    public $modelClass = 'app\models\News';

}