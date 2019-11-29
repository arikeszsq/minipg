<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserCardGii]].
 *
 * @see UserCardGii
 */
class UserCardQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserCardGii[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserCardGii|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
