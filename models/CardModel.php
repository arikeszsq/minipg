<?php


namespace app\models;

/**
 * @property CouponModel[] $couponModels
 * @package app\models
 * @deprecated
 */
class CardModel extends Card
{

    /**
     * 关联优惠券表
     * @return \yii\db\ActiveQuery
     */
    public function getCouponModels()
    {
        return $this->hasMany(CouponModel::className(), ['card_id' => 'id']);
    }

}