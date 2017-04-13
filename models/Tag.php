<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property int $tag_id 标签ID
 * @property string $tagname 标签名
 * @property string $description 描述
 * @property int $inputtime
 * @property int $updatetime
 *
 * @property TagNews[] $tagNews
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tag}}';
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
            [['tagname', 'description'], 'required'],
            [['tagname'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tag_id' => '标签ID',
            'tagname' => '标签名称',
            'description' => '描述',
            'inputtime' => '添加时间',
            'updatetime' => '更新时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagNews()
    {
        return $this->hasMany(TagNews::className(), ['tag_id' => 'tag_id']);
    }
}
