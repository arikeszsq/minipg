<?php


namespace app\modules\api\controllers;


use app\models\Card;
use app\models\UserCard;
use Yii;

class UserCardController extends BaseController
{
    public function actionLists()
    {
        $user = $this->requireLoginUser();
        if ($user['code'] != 200) {
            return $user;
        } else {
            $user_id = $user['user_id'];
        }
        $inputs = Yii::$app->request->get();
        $page = $inputs['page'] ?? 1;
        $per_page = $inputs['per_page'] ?? 10;
        $query = UserCard::find();
        $total_count = $query->count();
        $total_page = ceil($total_count / $per_page);
        $offset = ($page - 1) * $per_page;
        $user_cards = $query
            ->where(['user_id' => $user_id])
            ->offset($offset)
            ->limit($per_page)
            ->with('card')
            ->all();
        return [
            'code' => 200,
            'msg' => '获取成功',
            'data' => [
                'total_count' => $total_count,
                'total_page' => $total_page,
                'detail_list' => $user_cards
            ],
        ];
    }
}