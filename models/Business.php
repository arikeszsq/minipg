<?php

namespace app\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;


class Business extends BusinessGii
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


    const Status_正常 = 1;
    const Status_禁用 = 2;

    /**
     * 状态下拉选项
     * @return array
     */
    public static function statusDropdownList()
    {
        return [
            self::Status_正常 => '正常',
            self::Status_禁用 => '禁用',
        ];
    }

    /**
     * 返回状态文字
     * @return string
     */
    public static function getStatusTxt($num)
    {
        $array = self::statusDropdownList();
        return $array[$num];
    }
}
