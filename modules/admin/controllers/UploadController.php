<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/12 0012
 * Time: 10:34
 */

namespace app\modules\admin\controllers;
use app\models\Attachment;
use app\models\Upload;
use crazyfd\qiniu\Qiniu;
use kartik\file\FileInput;
use yii\data\Pagination;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;
use yii\widgets\LinkPager;

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
    //获取历史附件
    public function actionAttrfile()
    {
        $app=\Yii::$app;
        $userid=$app->user->id;
        $isimage=$app->request->get('isimage');
        $query=Attachment::find(['userid'=>$userid,'isimage'=>$isimage])->select(['id','filename','filepath']);
        $count=$query->count();
        $page=$app->request->get('page') ? $app->request->get('page') : 0;
        $pagination=new Pagination(['totalCount' => 8]);
        $pagination->defaultPageSize=10;
        $pagination->page=$page;
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->asArray()
            ->all();
        if($articles){
            $info['state']=1;
            $info['data']=$articles;
        }else{
            $info['state']=0;
        }
        $r['indexPage']= ceil($count/$pagination->defaultPageSize) - 1;
        $r['info']=$info;
        echo Json::encode($r);
    }


}