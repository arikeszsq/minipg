<?php

namespace app\models;

use Yii;

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
            [['start_time', 'end_time', 'updated_at'], 'safe'],
            [['name', 'status', 'logo_url', 'background_url', 'address', 'detail', 'price_detail', 'everyone_comment', 'created_at', 'deleted_at'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'price' => 'Price',
            'count' => 'Count',
            'origin_price' => 'Origin Price',
            'logo_url' => 'Logo Url',
            'background_url' => 'Background Url',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'address' => 'Address',
            'detail' => 'Detail',
            'price_detail' => 'Price Detail',
            'everyone_comment' => 'Everyone Comment',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
