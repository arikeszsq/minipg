<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_coupon".
 *
 * @property int $id
 * @property int $user_id
 * @property int $coupon_id
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
            [['id'], 'required'],
            [['id', 'user_id', 'coupon_id', 'status', 'total_num', 'stay_num'], 'integer'],
            [['updated_at'], 'safe'],
            [['created_at', 'deleted_at'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'coupon_id' => 'Coupon ID',
            'status' => 'Status',
            'total_num' => 'Total Num',
            'stay_num' => 'Stay Num',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
