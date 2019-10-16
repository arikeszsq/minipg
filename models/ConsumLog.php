<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consum_log".
 *
 * @property int $id
 * @property int $user_id
 * @property string $business_name
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class ConsumLog extends \yii\db\ActiveRecord
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
            [['id'], 'required'],
            [['id', 'user_id'], 'integer'],
            [['updated_at'], 'safe'],
            [['business_name', 'created_at', 'deleted_at'], 'string', 'max' => 255],
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
            'business_name' => 'Business Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
