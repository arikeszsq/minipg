<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "coupon".
 *
 * @property int $id
 * @property int $card_id
 * @property int $business_id
 * @property string $card_name
 * @property string $business_name
 * @property string $pic_url
 * @property string $name
 * @property string $description
 * @property string $tag
 * @property string $suitable_age_end
 * @property string $suitable_age_start
 * @property string $suitable_age
 * @property string $price
 * @property int $total_num
 * @property string $status
 * @property string $valid_time
 * @property string $valid_time_start
 * @property string $valid_time_end
 * @property string $using_flow
 * @property string $using_detail
 * @property string $check_code
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Coupon extends CouponGii
{
    const Status_有效 = 1;
    const Status_失效 = 2;

    /**
     * 状态下拉选项
     * @return array
     */
    public static function statusDropdownList()
    {
        return [
            self::Status_有效 => '有效',
            self::Status_失效 => '失效',
        ];
    }

    /**
     * 返回状态文字
     * @return string
     */
    public static function getStatusTxt($num)
    {
        $array = self::statusDropdownList();
        return $array[$num];
    }

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

}
