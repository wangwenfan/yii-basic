<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%attachment}}".
 *
 * @property int $id 附件ID
 * @property string $filename 附件名称
 * @property string $filepath 附件地址
 * @property string $fileext 扩展名
 * @property int $isimage 是否为图片
 * @property int $isthumb 是否为缩略图
 * @property int $userid 用户ID
 * @property int $inputtime
 * @property int $updatetime 更新时间
 */
class Attachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attachment}}';
    }

    /**自动写入时间
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'inputtime',
                'updatedAtAttribute' => 'updatetime',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filename', 'filepath', 'fileext'], 'required'],
            [['isimage', 'isthumb', 'userid', 'inputtime', 'updatetime'], 'integer'],
            [['filename'], 'string', 'max' => 100],
            [['filepath'], 'string', 'max' => 200],
            [['fileext'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => '附件名',
            'filepath' => '附件路径',
            'fileext' => '后缀',
            'isimage' => '是否是图片',
            'isthumb' => '是否是缩略图',
            'userid' => '用户id',
            'inputtime' => '添加时间',
            'updatetime' => '更新时间',
        ];
    }
}
