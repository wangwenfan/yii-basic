<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%setting}}".
 *
 * @property int $siteid 站点ID
 * @property string $sitename 站点名称
 * @property string $siteremark 站点描述
 * @property int $status 状态
 * @property string $sitelink 站点地址
 * @property string $logo logo
 * @property string $menus 站点菜单
 * @property int $updatetime 更新时间
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%setting}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['siteid', 'sitename', 'siteremark', 'sitelink', 'logo', 'menus', 'updatetime'], 'required'],
            [['siteid', 'status', 'updatetime'], 'integer'],
            [['sitename', 'sitelink'], 'string', 'max' => 50],
            [['siteremark', 'logo'], 'string', 'max' => 100],
            [['menus'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'siteid' => '站点ID',
            'sitename' => '站点名称',
            'siteremark' => '站点描述',
            'status' => '状态',
            'sitelink' => '域名',
            'logo' => 'Logo',
            'menus' => '菜单',
            'updatetime' => '更新时间',
        ];
    }
}
