<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_activity_comment".
 *
 * @property int $id
 * @property int $user_id
 * @property string $activity
 * @property string $content
 */
class UserActivityComment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_activity_comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['activity', 'content'], 'string', 'max' => 255],
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
            'activity' => 'Activity',
            'content' => 'Content',
        ];
    }
}
