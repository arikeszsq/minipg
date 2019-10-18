<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_info".
 *
 * @property int $id
 * @property int $user_id
 * @property string $openid
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
class UserInfo extends \yii\db\ActiveRecord
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
            [['updated_at','openid'], 'safe'],
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
            'openid'=>'openid',
            'user_id' => '用户id',
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
