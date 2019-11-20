<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $num 订单号
 * @property string $money 订单金额
 * @property string $type 订单类型：vip,event
 * @property string $aim_id
 * @property string $open_id 用户
 * @property string $user_name 用户名
 * @property int $is_used 使用过
 * @property string $status
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
            [['is_used'], 'integer'],
            [['num', 'money', 'type', 'aim_id', 'open_id', 'user_name', 'status', 'created_at','updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num' => 'Num',
            'money' => 'Money',
            'type' => 'Type',
            'aim_id' => 'Aim ID',
            'open_id' => 'Open ID',
            'user_name' => 'User Name',
            'is_used' => 'Is Used',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderQuery(get_called_class());
    }
}
