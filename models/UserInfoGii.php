<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_info".
 *
 * @property int $id
 * @property string $open_id
 * @property string $username
 * @property string $real_name
 * @property string $phone
 * @property string $status
 * @property string $parent_name
 * @property string $parent_mobile
 * @property string $child_name
 * @property string $child_gender
 * @property string $child_birthday
 * @property string $child_age
 * @property int $is_vip
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
            [['is_vip'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at','open_id', 'child_name', 'child_gender', 'child_age'], 'safe'],
            [['username', 'real_name', 'phone', 'status', 'parent_name', 'parent_mobile', 'child_birthday'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '用户ID',
            'open_id' => 'Open ID',
            'username' => '用户名',
            'real_name' => 'Real Name',
            'phone' => '手机号',
            'status' => '状态',
            'parent_name' => '父母姓名',
            'parent_mobile' => '父母手机号',
            'child_name' => '宝宝姓名',
            'child_gender' => '宝宝性别',
            'child_birthday' => '宝宝生日',
            'child_age' => '宝宝年龄',
            'is_vip' => '会员',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'deleted_at' => 'Deleted At',
        ];
    }
}
