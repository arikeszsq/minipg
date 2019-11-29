<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CouponGii]].
 *
 * @see CouponGii
 */
class CouponQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CouponGii[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CouponGii|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
