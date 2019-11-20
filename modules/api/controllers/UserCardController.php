<?php


namespace app\modules\api\controllers;


use app\models\Card;
use app\models\Coupon;
use app\models\Order;
use app\models\UserCard;
use app\models\UserCoupon;
use Yii;
use yii\helpers\ArrayHelper;

class UserCardController extends BaseController
{
//    /**
//     * 开通会员卡
//     * @return array
//     * @throws \Exception
//     */
//    public function actionOpen()
//    {
//        $ret = $this->requireLogin();
//        if ($ret['code'] != 200) {
//            return $ret;
//        }
//        $open_id = $ret['open_id'];
//        $user = $this->getUser($open_id);
//        $user_id = $user->id;
//        $inputs = Yii::$app->request->post();
//        $order_no = $inputs['order_no'];
//        if (empty($order_no)) {
//            return [
//                'code' => 100,
//                'msg' => '订单号必填！'
//            ];
//        }
//        $order = Order::find()->where(['num' => $order_no])->one();
//        if ($order->is_used == Order::Used_已使用) {
//            return [
//                'code' => 101,
//                'msg' => '订单号已经使用过了！'
//            ];
//        }
//        $card_id = $inputs['card_id'];
//        if (empty($card_id)) {
//            return [
//                'code' => 102,
//                'msg' => 'card_id必填！'
//            ];
//        }
//        $card = Card::findOne($card_id);
//        if (empty($card)) {
//            return [
//                'code' => 103,
//                'msg' => '会员卡不存在！'
//            ];
//        }
//        $user_card = $this->bind_card($user_id, $user, $card_id, $card);
//        $order->is_used = Order::Used_已使用;
//        $order->save();
//        $this->bind_coupon($user, $card_id);
//        return [
//            'code' => 200,
//            'msg' => '会员卡开通成功',
//            'data' => $user_card
//        ];
//    }

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
        $inputs = Yii::$app->request->post();
        $page = $inputs['page'] ?? 1;
        $per_page = $inputs['per_page'] ?? 10;
        $query = UserCard::find();
        $total_count = $query->count();
        $total_page = ceil($total_count / $per_page);
        $offset = ($page - 1) * $per_page;
        $user_cards = $query
            ->where(['user_id' => $user_id])
            ->with('card')
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