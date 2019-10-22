<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "card".
 *
 * @property int $id
 * @property string $name
 * @property string $status
 * @property string $pic_url
 * @property string $origin_price
 * @property int $count
 * @property string $price
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Card extends \yii\db\ActiveRecord
{
    const Status_使用中 = 1;
    const Status_已绝版 = 2;

    /**
     * 状态下拉选项
     * @return array
     */
    public static function statusDropdownList()
    {
        return [
            self::Status_使用中 => '使用中',
            self::Status_已绝版 => '已绝版',
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
        return 'card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['origin_price', 'price'], 'number'],
            [['updated_at', 'valid_time','coupons'], 'safe'],
            [['name', 'status', 'pic_url', 'created_at', 'deleted_at'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'status' => '状态',
            'valid_time' => '有效时常',
            'pic_url' => '图片',
            'origin_price' => 'Origin Price',
            'count' => 'Count',
            'price' => '价格',
            'created_at' => '创建时间',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
