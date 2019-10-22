<?php


namespace app\modules\api\controllers;


use app\models\Card;
use Yii;

class CardController extends BaseController
{
    public function actionLists()
    {
        $inputs = Yii::$app->request->get();
        $page = $inputs['page'] ?? 1;
        $per_page = $inputs['per_page'] ?? 10;
        $query = Card::find();
        $total_count = $query->count();
        $total_page = ceil($total_count / $per_page);
        $offset = ($page - 1) * $per_page;
        $cards = $query
            ->offset($offset)
            ->limit($per_page)
            ->all();
        return [
            'code' => 200,
            'msg' => '获取成功',
            'data' => [
                'total_count' => $total_count,
                'total_page' => $total_page,
                'detail_list' => $cards,
            ],
        ];
    }

    public function actionDetail()
    {
        $inputs = Yii::$app->request->get();
        $card_id = $inputs['card_id'];
        $detail = Card::find()
            ->where(['id'=>$card_id])
            ->with('coupons')
            ->with('activities')
            ->one();
        return [
            'code'=>200,
            'data'=>$detail
        ];
    }


}