<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

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
class UserCoupon extends UserCouponGii
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    # 创建时更新
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    # 修改时更新
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at']
                ],
                #设置默认值
                'value' => date("Y-m-d H:i:s")
            ]
        ];
    }

    public function getCoupon()
    {
        return $this->hasOne(Coupon::className(), ['id' => 'coupon_id']);
    }
}
