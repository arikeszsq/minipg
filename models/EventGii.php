<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property string $name 活动名
 * @property string $card_name 会员卡名称
 * @property int $status 状态
 * @property string $logo_url
 * @property string $background_url
 * @property string $start_time 开始时间
 * @property string $end_time 结束时间
 * @property string $address 活动地址
 * @property string $detail 活动详情
 * @property string $price 活动价格
 * @property string $price_detail 活动价格详情
 * @property int $is_hot 热门1  非热门 2
 * @property string $is_recommand 推荐1  不推荐2
 * @property int $need_vip 公益，所有人都可报名1   vip专享2
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class EventGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status', 'start_time', 'end_time', 'address', 'price', 'is_hot', 'is_recommand', 'need_vip'], 'required'],
            [['status', 'is_hot', 'need_vip'], 'integer'],
            [['start_time', 'end_time', 'created_at', 'updated_at', 'deleted_at','background_url','address_name'], 'safe'],
            [['price'], 'number'],
            [['name', 'card_name'], 'string', 'max' => 50],
            [['logo_url', 'address', 'detail', 'price_detail', 'is_recommand'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '活动名',
            'card_name' => '会员卡名',
            'status' => '状态',
            'logo_url' => 'Logo',
            'background_url' => '背景轮播图',
            'start_time' => '开始时间',
            'end_time' => '结束时间',
            'address_name' => '地址名称',
            'address' => '活动地址',
            'detail' => '活动详情',
            'price' => '价格',
            'price_detail' => '价格详情',
            'is_hot' => '热门',
            'is_recommand' => '推荐',
            'need_vip' => '需要会员',
            'created_at' => '创建时间',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
