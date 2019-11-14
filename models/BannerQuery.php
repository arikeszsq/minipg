<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BannerGii]].
 *
 * @see BannerGii
 */
class BannerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return BannerGii[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return BannerGii|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
