<?php

namespace app\models;

use Yii;

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
            [['origin_price', 'price'], 'number'],
            [['updated_at'], 'safe'],
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
            'name' => 'Name',
            'status' => 'Status',
            'pic_url' => 'Pic Url',
            'origin_price' => 'Origin Price',
            'count' => 'Count',
            'price' => 'Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
