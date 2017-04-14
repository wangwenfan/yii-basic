<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\behaviors\TimestampBehavior;

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
            [['catid', 'title', 'description', 'content'], 'required'],
            [['catid', 'inputtime', 'status'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
            [['thumb', 'title'], 'string', 'max' => 100],
            [['catid'], 'exist', 'skipOnError' => true, 'targetClass' => Cate::className(), 'targetAttribute' => ['catid' => 'catid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id' => '文章ID',
            'catid' => '栏目ID',
            'title' => '标题',
            'thumb' => '封面图片',
            'description' => '描述',
            'content' => '内容',
            'inputtime' => '添加时间',
            'status' => '状态',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Cate::className(), ['catid' => 'catid']);
    }

    public function getTag()
    {
        return $this->hasMany(TagNews::className(),['news_id'=>'news_id']);
    }

    /**写入文章数据
     * @return bool
     */
    public function insertData()
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $this->save();
            $news_id = Yii::$app->db->getLastInsertID();//文章id
            $tag_idArray = Yii::$app->request->post('TagNews')['tag_id'];
            $data = [];
            foreach ($tag_idArray as $tag_id) {
                $data[] = [
                    'tag_id' => $tag_id,
                    'news_id' => $news_id,
                    'inputtime' => time()
                ];
            }
            Yii::$app->db->createCommand()
                ->batchInsert(TagNews::tableName(), ['tag_id', 'news_id', 'inputtime'], $data)
                ->execute();
            $transaction->commit();
            return true;
        } catch (Exception $e) {
            $transaction->rollBack();
            return false;

        }
    }

    /**修改文章
     * @return bool
     */
    public function updateData()
    {
        $tag_idArray = Yii::$app->request->post('TagNews')['tag_id'];
        $transaction = Yii::$app->db->beginTransaction();
        try{
            $this->save();
            $data = [];
            TagNews::deleteAll('news_id=:news_id',[':news_id'=>$this->news_id]);
            foreach ($tag_idArray as $tag_id) {
                $data[] = [
                    'tag_id' => $tag_id,
                    'news_id' => $this->news_id,
                    'inputtime' => time()
                ];
            }
            Yii::$app->db->createCommand()
                ->batchInsert(TagNews::tableName(), ['tag_id', 'news_id', 'inputtime'], $data)
                ->execute();
            $transaction->commit();
            return true;
        }catch (\yii\db\Exception $e){
            $transaction->rollBack();
            return false;
        }
    }

    /**获取关联标签
     * @return $this
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['tag_id' => 'tag_id'])
            ->viaTable(TagNews::tableName(),['news_id'=>'news_id'])->asArray();
    }
}

