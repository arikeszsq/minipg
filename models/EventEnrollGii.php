<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_enroll".
 *
 * @property int $id
 * @property int $user_id
 * @property string $user_name
 * @property int $event_id
 * @property string $event_name
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class EventEnrollGii extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_enroll';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'event_id'], 'required'],
            [['user_id', 'event_id'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['user_name', 'event_name'], 'string', 'max' => 255],
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
            'event_id' => 'Event ID',
            'event_name' => '活动名',
            'created_at' => '报名时间',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
