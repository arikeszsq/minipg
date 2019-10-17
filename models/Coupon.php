<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coupon".
 *
 * @property int $id
 * @property int $card_id
 * @property string $card_name
 * @property string $pic_url
 * @property string $name
 * @property string $description
 * @property string $tag
 * @property string $suitable_age_end
 * @property string $suitable_age_start
 * @property string $suitable_age
 * @property string $price
 * @property int $total_num
 * @property string $status
 * @property string $valid_time
 * @property string $valid_time_start
 * @property string $valid_time_end
 * @property string $using_flow
 * @property string $using_detail
 * @property string $check_code
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Coupon extends \yii\db\ActiveRecord
{
    const Status_有效 = 1;
    const Status_失效 = 2;

    /**
     * 状态下拉选项
     * @return array
     */
    public static function statusDropdownList()
    {
        return [
            self::Status_有效 => '有效',
            self::Status_失效 => '失效',
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

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coupon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['card_name','name'], 'required'],
            [['price'], 'number'],
            [['valid_time', 'valid_time_start', 'valid_time_end', 'updated_at'], 'safe'],
            [['card_name', 'pic_url', 'name', 'description', 'tag', 'suitable_age_end', 'suitable_age_start', 'suitable_age', 'status', 'using_flow', 'using_detail', 'check_code', 'created_at', 'deleted_at'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'card_id' => 'Card ID',
            'card_name' => '卡名',
            'pic_url' => 'Pic Url',
            'name' => '优惠卷名',
            'description' => '描述',
            'tag' => '标签',
            'suitable_age_end' => '适应最小年龄',
            'suitable_age_start' => '适应最大年龄',
            'suitable_age' => '适应年龄',
            'price' => '价格',
            'total_num' => '总数',
            'status' => '状态',
            'valid_time' => '有效时间',
            'valid_time_start' => '有效开始时间',
            'valid_time_end' => '有效结束时间',
            'using_flow' => '使用流程',
            'using_detail' => '使用详情',
            'check_code' => '核销码',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'deleted_at' => '删除时间',
        ];
    }
}
