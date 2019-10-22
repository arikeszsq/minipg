<?php


namespace app\modules\api\controllers;


use app\models\CouponModel;
use Yii;

class CouponController extends BaseController
{
    public function actionLists()
    {
        $inputs = Yii::$app->request->get();
        $page = $inputs['page'] ?? 1;
        $per_page = $inputs['per_page'] ?? 10;
        $card_id = $inputs['card_id']??null;
        $query = CouponModel::find();
        $total_count = $query->count();
        $total_page = ceil($total_count / $per_page);
        $offset = ($page - 1) * $per_page;
        $coupons = $query
            ->andFilterWhere(['card_id' => $card_id])
            ->offset($offset)
            ->limit($per_page)
            ->all();
        return [
            'code' => 200,
            'msg' => '获取成功',
            'data' => [
                'total_count' => $total_count,
                'total_page' => $total_page,
                'detail_list' => $coupons,
            ],
        ];
    }

}