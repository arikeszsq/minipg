<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "card".
 *
 * @property int $id
 * @property string $name 会员卡名称
 * @property string $status 状态
 * @property string $valid_time_start 有效开始时间
 * @property string $valid_time_end 过期时间
 * @property string $valid_time 有效时间
 * @property string $pic_url 卡图
 * @property string $origin_price 原价
 * @property int $count 折扣
 * @property string $price 现在
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property string $deleted_at 删除时间
 */
class CardGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['valid_time_start', 'valid_time_end', 'name', 'status', 'price'], 'required'],
            [['valid_time_start', 'valid_time_end', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['origin_price', 'price'], 'number'],
            [['count'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 10],
            [['valid_time'], 'string', 'max' => 30],
            [['pic_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '卡名',
            'status' => '状态',
            'valid_time_start' => '有效开始时间',
            'valid_time_end' => '过期时间',
            'valid_time' => '有效期',
            'pic_url' => '卡图',
            'origin_price' => 'Origin Price',
            'count' => 'Count',
            'price' => '价格',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'deleted_at' => '删除时间',
        ];
    }
}
