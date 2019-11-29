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
            [['name', 'phone', 'address', 'status'], 'required'],
            [['updated_at', 'code', 'detail'], 'safe'],
            [['name', 'wx_num', 'logo', 'banner', 'address', 'tag', 'valid_age_end', 'valid_age_start', 'valid_age', 'coupon_detail', 'created_at', 'deleted_at'], 'string', 'max' => 255],
            [['phone'], 'match', 'pattern' => '/^1[3|4|5|7|8][0-9]{9}$/'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '商家名',
            'code' => '商家编号',
            'logo' => 'Logo',
            'banner' => 'Banner',
            'phone' => '手机号',
            'wx_num' => '微信号',
            'address' => '地址',
            'tag' => 'Tag',
            'valid_age_end' => 'Valid Age End',
            'valid_age_start' => 'Valid Age Start',
            'valid_age' => 'Valid Age',
            'detail' => '详情',
            'coupon_detail' => 'Coupon Detail',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'deleted_at' => '删除时间',
        ];
    }
}
