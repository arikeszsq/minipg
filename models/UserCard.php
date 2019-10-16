<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_card".
 *
 * @property int $id
 * @property int $user_id
 * @property int $card_id
 * @property string $status
 * @property string $valid_time_start
 * @property string $valid_time_end
 * @property string $valid_time
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
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
            [['valid_time_start', 'valid_time_end', 'valid_time', 'updated_at'], 'safe'],
            [['status', 'created_at', 'deleted_at'], 'string', 'max' => 255],
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
            'status' => 'Status',
            'valid_time_start' => 'Valid Time Start',
            'valid_time_end' => 'Valid Time End',
            'valid_time' => 'Valid Time',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
