<?php


namespace app\modules\api\controllers;


use app\models\Card;
use app\models\UserCard;
use Yii;
use yii\helpers\ArrayHelper;

class UserCardController extends BaseController
{
    /**
     * 我的会员卡列表
     * @return array
     */
    public function actionLists()
    {
        $ret = $this->requireLogin();
        if ($ret['code'] != 200) {
            return $ret;
        }
        $open_id = $ret['open_id'];
        $user = $this->getUser($open_id);
        $user_id = $user->id;
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
            ->asArray()
            ->all();
        $card_ids = arrayHelper::getColumn($user_cards, 'card_id');
        $other_cards = Card::find()->where(['not in', 'id', $card_ids])->asArray()->all();
        return [
            'code' => 200,
            'msg' => '获取成功',
            'data' => [
                'total_count' => $total_count,
                'total_page' => $total_page,
                'detail_list' => $user_cards,
                'other_cards' => $other_cards
            ],
        ];
    }
}