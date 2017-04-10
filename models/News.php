<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property int $news_id
 * @property int $catid 栏目ID
 * @property string $title 标题
 * @property string $description 描述
 * @property string $content 内容
 * @property int $inputtime
 * @property int $status 状态
 *
 * @property Cate $cat
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catid', 'title', 'description', 'content', 'inputtime'], 'required'],
            [['catid', 'inputtime', 'status'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
            [['catid'], 'exist', 'skipOnError' => true, 'targetClass' => Cate::className(), 'targetAttribute' => ['catid' => 'catid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'News ID',
            'catid' => 'Catid',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'inputtime' => 'Inputtime',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Cate::className(), ['catid' => 'catid']);
    }
}
