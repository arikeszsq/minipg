<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_card".
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property string $user_name
 * @property int $open_id
 * @property int $card_id 会员卡id
 * @property string $card_name 会员卡名称
 * @property string $card_num 卡号
 * @property int $status 状态
 * @property string $valid_time_start 有效期开始时间
 * @property string $valid_time_end 有效期结束时间
 * @property string $valid_time 有效时间
 * @property string $cipher 密钥
 * @property int $everyone_max_num 每个人最多购买本会员卡的数量
 * @property int $already_card_num 已经购买本会员卡的数量
 * @property int $stay_card_num 剩余可以购买本会员卡的数量
 * @property int $max_coupon_num 可以领取优惠券的最多数量
 * @property int $already_coupon_num 已经领取的优惠券数量
 * @property int $stay_coupon_num 剩余可以领取优惠券的数量
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property string $deleted_at 删除时间
 */
class UserCardGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'card_id'], 'required'],
            [['user_id', 'everyone_max_num', 'already_card_num', 'stay_card_num', 'max_coupon_num', 'already_coupon_num', 'stay_coupon_num', 'valid_time_start', 'status', 'card_id', 'open_id', 'valid_time_end', 'valid_time', 'created_at', 'updated_at', 'deleted_at', 'cipher', 'user_name', 'card_num', 'card_name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户ID',
            'user_name' => '用户名',
            'open_id' => 'Open ID',
            'card_id' => '会员卡ID',
            'card_name' => '卡名',
            'card_num' => '卡号',
            'status' => '状态',
            'valid_time_start' => '有效开始时间',
            'valid_time_end' => '有效结束时间',
            'valid_time' => '有效期',
            'cipher' => '密钥',
            'everyone_max_num' => '每人最大购买数',
            'already_card_num' => '已购数',
            'stay_card_num' => '剩余购买数',
            'max_coupon_num' => '最大优惠券领取数',
            'already_coupon_num' => '已领取优惠券数',
            'stay_coupon_num' => '剩余可领取优惠券数',
            'created_at' => '购买时间',
            'updated_at' => '更新时间',
            'deleted_at' => '删除时间',
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserCouponQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserCouponQuery(get_called_class());
    }
}
