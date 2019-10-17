<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $name
 * @property string $status
 * @property string $price
 * @property int $count
 * @property string $origin_price
 * @property string $logo_url
 * @property string $background_url
 * @property string $start_time
 * @property string $end_time
 * @property string $address
 * @property string $detail
 * @property string $price_detail
 * @property string $everyone_comment
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Activity extends \yii\db\ActiveRecord
{
    const Status_未开始 = 1;
    const Status_使用中 = 2;
    const Status_已结束 = 3;

    /**
     * 状态下拉选项
     * @return array
     */
    public static function statusDropdownList()
    {
        return [
            self::Status_未开始 => '未开始',
            self::Status_使用中 => '使用中',
            self::Status_已结束 => '已结束',
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

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'origin_price'], 'number'],
            [['start_time', 'end_time', 'updated_at','status'], 'safe'],
            [['name', 'logo_url', 'background_url', 'address', 'detail', 'price_detail', 'everyone_comment', 'created_at', 'deleted_at'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '活动名称',
            'status' => '状态',
            'price' => '价格',
            'count' => 'Count',
            'origin_price' => 'Origin Price',
            'logo_url' => 'logo',
            'background_url' => '背景图',
            'start_time' => '开始时间',
            'end_time' => '结束时间',
            'address' => '地址',
            'detail' => '活动详情',
            'price_detail' => '价格详情',
            'everyone_comment' => '大家说',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'deleted_at' => '删除时间',
        ];
    }
}
