<?php


namespace app\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Admin extends AdminGii
{
    public static $admin;

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

    public function _password($password)
    {
        return md5('mini' . $password);
    }

    public function getAdmin($username)
    {
        $admin = Admin::find()->where(['user_name'=>$username])->one();
        return $admin;
    }
}