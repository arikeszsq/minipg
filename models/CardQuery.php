<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CardGii]].
 *
 * @see CardGii
 */
class CardQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CardGii[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CardGii|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
