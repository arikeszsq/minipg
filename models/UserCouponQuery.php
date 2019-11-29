<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserCouponGii]].
 *
 * @see UserCouponGii
 */
class UserCouponQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserCouponGii[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserCouponGii|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
