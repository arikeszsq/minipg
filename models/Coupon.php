<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coupon".
 *
 * @property int $id
 * @property int $business_id
 * @property string $business_name
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
            [['price'], 'number'],
            [['valid_time', 'valid_time_start', 'valid_time_end', 'updated_at'], 'safe'],
            [['business_name', 'pic_url', 'name', 'description', 'tag', 'suitable_age_end', 'suitable_age_start', 'suitable_age', 'status', 'using_flow', 'using_detail', 'check_code', 'created_at', 'deleted_at'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'business_id' => 'Business ID',
            'business_name' => 'Business Name',
            'pic_url' => 'Pic Url',
            'name' => 'Name',
            'description' => 'Description',
            'tag' => 'Tag',
            'suitable_age_end' => 'Suitable Age End',
            'suitable_age_start' => 'Suitable Age Start',
            'suitable_age' => 'Suitable Age',
            'price' => 'Price',
            'total_num' => 'Total Num',
            'status' => 'Status',
            'valid_time' => 'Valid Time',
            'valid_time_start' => 'Valid Time Start',
            'valid_time_end' => 'Valid Time End',
            'using_flow' => 'Using Flow',
            'using_detail' => 'Using Detail',
            'check_code' => 'Check Code',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
