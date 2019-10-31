<?php


namespace app\modules\api\controllers;


use app\models\Card;
use app\models\UserCard;
use Yii;

class CardController extends BaseController
{
    public function actionLists()
    {
        $inputs = Yii::$app->request->post();
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

    /**
     * 获取会员卡详情
     * @return array
     */
    public function actionDetail()
    {
        $ret = $this->requireLogin();
        if ($ret['code'] != 200) {
            return $ret;
        }
        $open_id = $ret['open_id'];
        $user = $this->getUser($open_id);
        $user_id = $user->id;
        $inputs = Yii::$app->request->post();
        $card_id = $inputs['card_id'];
        $user_card = UserCard::find()->where(['user_id' => $user_id])->andWhere(['card_id' => $card_id])->one();
        if ($user_card) {
            $is_vip = 1;
        } else {
            $is_vip = 0;
        }
        $card = Card::find()
            ->with('coupons')
            ->with('events')
            ->where(['id' => $card_id])
            ->asArray()
            ->one();
        return [
            'code' => 200,
            'msg' => '成功获取',
            'card' => $card,
            'is_vip' => $is_vip
        ];
    }

}