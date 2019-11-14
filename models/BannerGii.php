<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property int $id
 * @property string $url
 * @property string $name
 * @property string $to_url
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class BannerGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['url', 'name', 'to_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'url' => '图片地址',
            'name' => '名称',
            'to_url' => '跳转地址',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return BannerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BannerQuery(get_called_class());
    }
}
