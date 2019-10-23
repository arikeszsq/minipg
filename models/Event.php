<?php


namespace app\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Event extends EventGii
{
    const Status_未开始 = 1;
    const Status_进行中 = 2;
    const Status_已结束 = 3;

    const Hot_热门 = 1;
    const Hot_非热门 = 2;

    const Select_精选 = 1;
    const Select_非精选 = 2;

    const Vip_需要 = 1;
    const Vip_不需要 = 2;

    /**
     * 状态下拉选项
     * @return array
     */
    public static function statusDropdownList()
    {
        return [
            self::Status_未开始 => '未开始',
            self::Status_进行中 => '进行中',
            self::Status_已结束 => '已结束',
        ];
    }

    public static function hotDropdownList()
    {
        return [
            self::Hot_热门 => '热门',
            self::Hot_非热门 => '非热门',
        ];
    }

    public static function selectDropdownList()
    {
        return [
            self::Select_精选 => '精选',
            self::Select_非精选 => '非精选',
        ];
    }

    public static function vipDropdownList()
    {
        return [
            self::Vip_需要 => '需要Vip',
            self::Vip_不需要 => '不需要Vip',
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
}