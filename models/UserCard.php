<?php

namespace app\models;


/**
 * @property string $card
 */
class UserCard extends UserCardGii
{
    public function getCard()
    {
        return $this->hasOne(Card::className(), ['id' => 'card_id']);
    }
}
