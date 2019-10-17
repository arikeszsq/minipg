<?php

namespace app\modules\admin\service;

use app\models\Card;

class CardService extends Card
{
    public function getCardNameList()
    {
        $cards = Card::find()->all();
        $data = [];
        foreach ($cards as $card) {
            $data[$card->name] = $card->name;
        }
        return $data;
    }

    public function getCardId($name)
    {
        $card = Card::find()->where(['name' => $name])->one();
        if ($card) {
            $id = $card->id;
        }
        return $id ?? '';
    }

}