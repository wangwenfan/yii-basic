<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/12 0012
 * Time: 10:34
 */

namespace app\modules\admin\controllers;
use app\models\Upload;
use crazyfd\qiniu\Qiniu;
use yii\helpers\Json;
use yii\web\Controller;

class UploadController extends Controller
{
    public function actionUplodfile()
    {
        $model = new Upload();
        if(\Yii::$app->request->isPost){
            $info=$model->uploadImageFile();
            if($info['state']){
                echo Json::encode([
                    'imageUrl'    => $info['info'][0],
                    'error'   => ''	//上传的error字段，如果没有错误就返回空字符串，否则返回错误信息，客户端会自动判定该字段来认定是否有错
                ]);
            }else{
                echo Json::encode([
                    'imageUrl'    => '',
                    'error'   => $info['info']['file'][0]
                ]);
            }
        }
    }

}