<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coupon".
 *
 * @property int $id
 * @property int $card_id 会员卡id
 * @property string $card_name 会员卡名称
 * @property int $business_id 商家id
 * @property string $business_name 商家名称
 * @property string $pic_url
 * @property string $name 优惠卷名称
 * @property string $description 描述
 * @property string $tag 标签
 * @property string $suitable_age_end
 * @property string $suitable_age_start
 * @property string $suitable_age
 * @property string $price 价格
 * @property int $total_num 数量
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
class CouponGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coupon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'card_name', 'business_name', 'pic_url', 'suitable_age_end', 'suitable_age_start', 'price', 'total_num', 'valid_time_start', 'valid_time_end', 'status'], 'required'],
            [['suitable_age_end','suitable_age_start','price'], 'number'],
            [['valid_time', 'valid_time_start', 'valid_time_end', 'created_at', 'updated_at', 'deleted_at', 'check_code'], 'safe'],
            [['card_name', 'business_name', 'pic_url', 'name', 'description', 'tag', 'suitable_age', 'using_flow', 'using_detail'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'card_id' => 'Card ID',
            'card_name' => '会员卡名',
            'business_id' => 'Business ID',
            'business_name' => '商家名',
            'pic_url' => '图标',
            'name' => '优惠券名',
            'description' => '描述',
            'tag' => '标签',
            'suitable_age_end' => '适应结束年龄',
            'suitable_age_start' => '适应开始年龄',
            'suitable_age' => '适应年龄',
            'price' => '价格',
            'total_num' => '数目',
            'status' => '状态',
            'valid_time' => '有效期',
            'valid_time_start' => '有效期开始时间',
            'valid_time_end' => '有效期结束时间',
            'using_flow' => '使用流程',
            'using_detail' => '使用详情',
            'check_code' => '校验码',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'deleted_at' => '删除时间',
        ];
    }
}
