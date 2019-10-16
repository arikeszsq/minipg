<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_info".
 *
 * @property int $id
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
            [['id'], 'required'],
            [['id', 'user_id'], 'integer'],
            [['updated_at'], 'safe'],
            [['username', 'real_name', 'mobile', 'phone', 'birthday', 'baby_gender', 'created_at', 'deleted_at'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
            'username' => 'Username',
            'real_name' => 'Real Name',
            'mobile' => 'Mobile',
            'phone' => 'Phone',
            'birthday' => 'Birthday',
            'baby_gender' => 'Baby Gender',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
