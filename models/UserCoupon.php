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
 * @property int $total_num
 * @property int $stay_num
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class UserCoupon extends \yii\db\ActiveRecord
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
            [['user_id', 'coupon_id', 'status', 'total_num', 'stay_num'], 'integer'],
            [['updated_at'], 'safe'],
            [['username', 'coupon_name', 'created_at', 'deleted_at'], 'string', 'max' => 255],
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
            'coupon_id' => 'Coupon ID',
            'coupon_name' => '优惠券名称',
            'status' => 'Status',
            'total_num' => '总数',
            'stay_num' => '剩余数',
            'created_at' => '使用时间',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    public function getCoupon()
    {
        return $this->hasOne(Coupon::className(), ['id' => 'coupon_id']);
    }
}
