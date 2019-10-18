<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_card".
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property int $card_id 会员卡id
 * @property string $card_name 会员卡名称
 * @property int $status 状态
 * @property string $valid_time_start 有效期开始时间
 * @property string $valid_time_end 有效期结束时间
 * @property string $valid_time 有效时间
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property string $deleted_at 删除时间
 * @property string $parent_name 父母姓名
 * @property string $card_num 卡号
 * @property int $parent_moblie 父母手机号
 * @property string $child_name 宝宝姓名
 * @property string $child_gender 宝宝性别
 * @property string $child_birthday 宝宝生日
 * @property string $child_age 宝宝年龄
 * @property string $cipher 密钥
 */
class UserCard extends \yii\db\ActiveRecord
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
            [['user_id', 'card_id', 'parent_name', 'parent_moblie'], 'required'],
            [['user_id', 'card_id', 'status', 'parent_moblie'], 'integer'],
            [['valid_time_start', 'valid_time_end', 'valid_time', 'updated_at'], 'safe'],
            [['card_name'], 'string', 'max' => 30],
            [['created_at', 'deleted_at', 'parent_name', 'card_num', 'child_name', 'child_gender', 'child_birthday', 'child_age', 'cipher'], 'string', 'max' => 255],
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
            'card_id' => 'Card ID',
            'card_name' => 'Card Name',
            'status' => 'Status',
            'valid_time_start' => 'Valid Time Start',
            'valid_time_end' => 'Valid Time End',
            'valid_time' => 'Valid Time',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
            'parent_name' => 'Parent Name',
            'card_num' => 'Card Num',
            'parent_moblie' => 'Parent Moblie',
            'child_name' => 'Child Name',
            'child_gender' => 'Child Gender',
            'child_birthday' => 'Child Birthday',
            'child_age' => 'Child Age',
            'cipher' => 'Cipher',
        ];
    }
}
