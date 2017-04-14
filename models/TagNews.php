<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tag_news}}".
 *
 * @property int $news_id 文章ID
 * @property int $tag_id 标签ID
 * @property int $inputtime 添加时间
 *
 * @property News $news
 * @property Tag $tag
 */
class TagNews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tag_news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'tag_id'], 'required'],
            [['news_id', 'tag_id'], 'integer'],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['news_id' => 'news_id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['tag_id' => 'tag_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id' => '文章ID',
            'tag_id' => '标签ID',
            'inputtime' => 'Inputtime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::className(), ['news_id' => 'news_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['tag_id' => 'tag_id']);
    }

    /**根据文章id查询标签
     * @param $news_id
     * @return static[]
     */
    public function getTagList($news_id)
    {
        return self::findAll(['news_id'=>$news_id]);
    }
}
