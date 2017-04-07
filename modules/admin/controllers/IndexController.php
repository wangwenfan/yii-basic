<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/7 0007
 * Time: 14:05
 */

namespace app\modules\admin\controllers;
use app\models\LoginForm;
use app\models\User;
use Yii;
use yii\db\Query;
use yii\web\Controller;

class IndexController extends Controller
{

    /**首页
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    /**
     * 登录
     */
    public function actionLogin()
    {
        $model = new LoginForm();
//        \Yii::$app->getSession()->setFlash('success', '登录成功');
        $request= Yii::$app->request;
        if($model->load($request->post()) && $model->login()){

        }else{
            return $this->render('login',['model'=>$model]);
        }

    }

}