<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_card".
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property string $user_name
 * @property int $open_id
 * @property int $card_id 会员卡id
 * @property string $card_name 会员卡名称
 * @property string $card_num 卡号
 * @property int $status 状态
 * @property string $valid_time_start 有效期开始时间
 * @property string $valid_time_end 有效期结束时间
 * @property string $valid_time 有效时间
 * @property string $cipher 密钥
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property string $deleted_at 删除时间
 */
class UserCardGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'card_id'], 'required'],
            [['user_id', 'open_id', 'card_id', 'status'], 'integer'],
            [['valid_time_start', 'valid_time_end', 'valid_time', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['user_name', 'card_num', 'cipher'], 'string', 'max' => 255],
            [['card_name'], 'string', 'max' => 30],
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
            'user_name' => '用户名',
            'open_id' => 'Open ID',
            'card_id' => 'Card ID',
            'card_name' => '会员卡名',
            'card_num' => 'Card Num',
            'status' => '状态',
            'valid_time_start' => 'Valid Time Start',
            'valid_time_end' => 'Valid Time End',
            'valid_time' => 'Valid Time',
            'cipher' => 'Cipher',
            'created_at' => '开卡时间',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
