<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

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
class ConsumLog extends ConsumLogGii
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    # 创建时更新
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    # 修改时更新
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at']
                ],
                #设置默认值
                'value' => date("Y-m-d H:i:s")
            ]
        ];
    }

    public function add_log($user_id, $username, $business_name)
    {
        $log = new ConsumLog();
        $log->user_id = $user_id;
        $log->username = $username;
        $log->business_name = $business_name;
        $log->save();
    }
}
