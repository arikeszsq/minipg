<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[OrderGii]].
 *
 * @see OrderGii
 */
class OrderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return OrderGii[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return OrderGii|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
