<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/7 0007
 * Time: 14:05
 */

namespace app\modules\admin\controllers;
use app\models\LoginForm;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;

class IndexController extends Controller
{

    /**首页
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['index/login']);
        }else{
            return $this->render('index');
        }

    }

    /**
     * 登录
     */
    public function actionLogin()
    {

        if(!Yii::$app->user->isGuest){
            return $this->goHome();
        }
        $model = new LoginForm();
        $request= Yii::$app->request;
        if($model->load($request->post()) && $model->login()){
            Yii::$app->getSession()->setFlash('success', '登录成功');
            return $this->goBack();
        }else{
            return $this->renderPartial('login',['model'=>$model]);
        }

    }

    /**
     *退出登录
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

}