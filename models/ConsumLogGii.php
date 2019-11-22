<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consum_log".
 *
 * @property int $id
 * @property int $user_id
 * @property string $username
 * @property string $business_name
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class ConsumLogGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consum_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['updated_at', 'username'], 'safe'],
            [['business_name', 'created_at', 'deleted_at'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户ID',
            'username' => '用户名',
            'business_name' => '商家名称',
            'created_at' => '消费时间',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ConsumLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConsumLogQuery(get_called_class());
    }
}
