<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/12 0012
 * Time: 14:12
 */

namespace app\modules\home\controllers;
use yii\rest\ActiveController;
class UserController extends ActiveController
{
    public $modelClass = 'app\models\News';


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['application/json'] = 'json';
        $behaviors['contentNegotiator']['formats']['application/xml'] = 'json';
        return $behaviors;
    }
    public function actionindex()
    {


    }
}