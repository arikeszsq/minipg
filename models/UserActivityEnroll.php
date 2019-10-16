<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_activity_enroll".
 *
 * @property int $id
 * @property int $user_id
 * @property int $activity_id
 */
class UserActivityEnroll extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_activity_enroll';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'activity_id'], 'integer'],
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
            'activity_id' => 'Activity ID',
        ];
    }
}
