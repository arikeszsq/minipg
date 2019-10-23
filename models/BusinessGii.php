<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "business".
 *
 * @property int $id
 * @property string $name 商家名称
 * @property string $code 商家码
 * @property string $logo logo
 * @property string $banner 广告图
 * @property string $phone 手机号
 * @property string $wx_num 微信号
 * @property string $address 地址
 * @property string $tag 标签
 * @property string $valid_age_end 适合最小年龄
 * @property string $valid_age_start 适合最大年龄
 * @property string $valid_age 适合年龄
 * @property string $detail 商家详情
 * @property string $coupon_detail 优惠卷使用详情
 * @property string $status 状态
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property string $deleted_at
 */
class BusinessGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'business';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'address'], 'required'],
            [['updated_at', 'code'], 'safe'],
            [['name', 'code', 'logo', 'banner', 'phone', 'address', 'tag', 'valid_age_end', 'valid_age_start', 'valid_age', 'detail', 'coupon_detail', 'status', 'created_at', 'deleted_at'], 'string', 'max' => 255],
            [['wx_num'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'logo' => 'Logo',
            'banner' => 'Banner',
            'phone' => 'Phone',
            'wx_num' => 'Wx Num',
            'address' => 'Address',
            'tag' => 'Tag',
            'valid_age_end' => 'Valid Age End',
            'valid_age_start' => 'Valid Age Start',
            'valid_age' => 'Valid Age',
            'detail' => 'Detail',
            'coupon_detail' => 'Coupon Detail',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
