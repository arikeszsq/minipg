<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_coupon".
 *
 * @property int $id
 * @property int $user_id
 * @property string $username
 * @property int $coupon_id
 * @property string $coupon_name
 * @property int $status 1:有效  2:已使用
 * @property int $everyone_max_num 每个人最多允许领取本优惠券的数量
 * @property int $already_get_num 已经领取优惠券的数量
 * @property int $stay_get_num 剩余可以领取本优惠券的数量
 * @property int $stay_num 本优惠券剩余可以消费的数量
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class UserCouponGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_coupon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'coupon_id'], 'required'],
            [['user_id', 'coupon_id', 'status', 'everyone_max_num', 'already_get_num', 'stay_get_num', 'stay_num', 'updated_at', 'username', 'coupon_name'], 'safe'],
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
            'username' => '用户名',
            'coupon_id' => '优惠券ID',
            'coupon_name' => '优惠券名称',
            'status' => '状态',
            'everyone_max_num' => '每人最大领取数',
            'already_get_num' => '已领数',
            'stay_get_num' => '剩余可领数',
            'stay_num' => '剩余可使用数',
            'created_at' => '领取时间',
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
