<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "business".
 *
 * @property int $id
 * @property string $name 商家名称
 * @property string $code 商家码
 * @property string $tag 标签
 * @property string $logo logo
 * @property string $banner 广告图
 * @property string $phone 手机号
 * @property string $wx_num 微信号
 * @property string $address 地址
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
class Business extends \yii\db\ActiveRecord
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
            [['updated_at'], 'safe'],
            [['name', 'code', 'tag', 'logo', 'banner', 'phone', 'address', 'valid_age_end', 'valid_age_start', 'valid_age', 'detail', 'coupon_detail', 'status', 'created_at', 'deleted_at'], 'string', 'max' => 255],
            [['wx_num'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'name' => '商家名称',
            'code' => '商家码',
            'tag' => '标签',
            'logo' => 'Logo',
            'banner' => '背景图',
            'phone' => '手机号',
            'wx_num' => '微信号',
            'address' => '商家地址',
            'valid_age_end' => '适合最小年龄',
            'valid_age_start' => '适合最大年龄',
            'valid_age' => '适合年龄',
            'detail' => '商家详情',
            'coupon_detail' => '优惠券使用详情',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'deleted_at' => '删除时间',
        ];
    }
}
