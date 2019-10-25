<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_info".
 *
 * @property int $id
 * @property string $open_id
 * @property int $user_id
 * @property string $username
 * @property string $real_name
 * @property string $mobile
 * @property string $phone
 * @property string $birthday
 * @property string $baby_gender
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class UserInfoGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['updated_at'], 'safe'],
            [['open_id'], 'string', 'max' => 50],
            [['username', 'real_name', 'mobile', 'phone', 'birthday', 'baby_gender', 'created_at', 'deleted_at'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'open_id' => 'Open ID',
            'user_id' => 'User ID',
            'username' => '用户名',
            'real_name' => '真实姓名',
            'mobile' => '手机号',
            'phone' => '手机号',
            'birthday' => '生日',
            'baby_gender' => '宝宝性别',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'deleted_at' => '删除时间',
        ];
    }
}
