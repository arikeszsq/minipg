<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "card".
 *
 * @property int $id
 * @property string $name 会员卡名称
 * @property string $description 描述
 * @property string $status 状态
 * @property string $valid_time_start 有效开始时间
 * @property string $valid_time_end 过期时间
 * @property string $valid_time 有效时间
 * @property string $pic_url 卡图
 * @property string $price 现价
 * @property string $origin_price 原价
 * @property int $count 折扣
 * @property int $sale_max_num 库存，允许最大销售数量，0代表无上限
 * @property int $already_sale_num 已销售数量
 * @property int $stay_num 剩余可以销售库存
 * @property int $version 版本
 * @property int $allow_coupon_num 允许领取的优惠券数量
 * @property int $everyone_max_num 每个人最大允许购买数量
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
            [['name', 'status', 'valid_time_start', 'valid_time_end', 'price', 'allow_coupon_num'], 'required'],
            [['valid_time_start', 'valid_time_end', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['price', 'origin_price'], 'number'],
            [['count', 'sale_max_num', 'already_sale_num', 'stay_num', 'version', 'allow_coupon_num', 'everyone_max_num'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['description', 'pic_url'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 10],
            [['valid_time'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'description' => '描述',
            'status' => '状态',
            'valid_time_start' => '有效开始时间',
            'valid_time_end' => '有效结束时间',
            'valid_time' => '有效期',
            'pic_url' => '封面图',
            'price' => '价格',
            'origin_price' => 'Origin Price',
            'count' => 'Count',
            'sale_max_num' => '库存',
            'already_sale_num' => '已销售数量',
            'stay_num' => '剩余库存',
            'version' => '版本',
            'allow_coupon_num' => '允许领取优惠券数目',
            'everyone_max_num' => '每人最多购买本卡数',
            'created_at' => '新建时间',
            'updated_at' => '更新时间',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return CardQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CardQuery(get_called_class());
    }
}
