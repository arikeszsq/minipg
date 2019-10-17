<?php
namespace app\modules\admin\service;

use app\models\Card;

class CardService extends Card
{
    public function getCardNameList()
    {
        $cards = Card::find()->all();
        $data = [];
        foreach($cards as $card){
            $data[] = $card->name;
        }
        return $data;
    }

}