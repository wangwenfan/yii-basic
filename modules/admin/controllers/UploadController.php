<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/12 0012
 * Time: 10:34
 */

namespace app\modules\admin\controllers;
use app\models\Upload;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\UploadedFile;

class UploadController extends Controller
{
    public function actionUplodfile()
    {
        $model = new Upload();
        if(\Yii::$app->request->isPost){
            $model->file= UploadedFile::getInstance($model,'file');
            $dir = \Yii::getAlias("@webroot").'/uploads/image/'.date('Ymd');
            if(!is_dir($dir)){
                mkdir($dir);
            }
            if($model->validate()){
                //文件名
                $fileName = date("HiiHsHis").$model->file->baseName . "." . $model->file->extension;
                $dir = $dir."/". $fileName;
                $model->file->saveAs($dir);
                $uploadSuccessPath = "/uploads/image/".date("Ymd")."/".$fileName;
                $p1[0] = $uploadSuccessPath;
                echo Json::encode([
                    'imageUrl'    => $uploadSuccessPath,
                    'error'   => ''		//上传的error字段，如果没有错误就返回空字符串，否则返回错误信息，客户端会自动判定该字段来认定是否有错
                ]);
            }else{
                echo Json::encode([
                    'imageUrl'    => '',
                    'error'   => '文件上传失败'
                ]);
            }

        }
    }

}