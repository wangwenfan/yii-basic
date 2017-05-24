<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/12 0012
 * Time: 10:32
 */

namespace app\models;


use yii\base\Model;
use yii\web\UploadedFile;

class Upload extends Model
{
    public $file;

    public function rules()
    {
        return [
          [['file'],'image','maxSize'=>1024*1024*2,'maxFiles'=>3],
        ];
    }

    /**文件上传
     * @return mixed
     */
    public function uploadImageFile()
    {
        $this->file= UploadedFile::getInstances(new self(),'file');
        $dir = \Yii::getAlias("@webroot").'/uploads/image/'.date('Ymd');
        if(!is_dir($dir)){
            mkdir($dir);
        }
        if($this->validate()){
            $model=new Attachment();
            foreach ($this->file as $key=>$image){
                //文件名
                $fileName = md5(date("HiiHsHis").$image->baseName) . "." . $image->extension;
                $dir = $dir."/". $fileName;
                $image->saveAs($dir);
                $uploadSuccessPath = "/uploads/image/".date("Ymd")."/".$fileName;
                $p1[$key] = $uploadSuccessPath;
                $model->filename=$image->baseName;
                $model->fileext=$image->extension;
                $model->filepath=$uploadSuccessPath;
                $model->save();
            }
            $data['state']=1;
            $data['info']=$p1;
            return $data;
        }else{
            $error=$this->getErrors();
            $data['state']=0;
            $data['info']=$error;
        }
    }


}