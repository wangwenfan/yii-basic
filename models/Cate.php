<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cate}}".
 *
 * @property int $catid
 * @property string $catname 栏目名
 * @property string $description 描述
 * @property int $inputtime
 *
 * @property News[] $news
 */
class Cate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cate}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catname', 'description', 'inputtime'], 'required'],
            [['inputtime'], 'integer'],
            [['catname'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'catid' => 'Catid',
            'catname' => '栏目名称',
            'description' => '栏目描述',
            'inputtime' => 'Inputtime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['catid' => 'catid']);
    }
}
