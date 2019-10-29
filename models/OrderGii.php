<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $num 订单号
 * @property string $money 订单金额
 * @property string $type 订单类型：vip,event
 * @property int $open_id 用户
 * @property string $user_name 用户名
 * @property int $is_used 使用过
 * @property string $created_at
 * @property string $updated_at
 */
class OrderGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['updated_at','status'], 'safe'],
            [['money', 'type', 'user_name', 'created_at'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num' => '订单号',
            'money' => '金额',
            'type' => '类型',
            'open_id' => 'Open ID',
            'user_name' => '用户名',
            'is_used' => 'Is Used',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
