<?php


namespace app\modules\api\controllers;


use app\models\Card;
use app\models\Coupon;
use app\models\Event;
use app\models\EventEnroll;
use app\models\Order;
use app\models\UserCard;
use app\models\UserCoupon;
use app\models\UserInfo;
use app\modules\api\traits\WeChatTrait;

class NotifyController extends BaseController
{
    use WeChatTrait;

    public function actionIndex()
    {
        $xml = file_get_contents('php://input');
        libxml_disable_entity_loader(true);
        $result = $this->xmlstr_to_array($xml);
        file_put_contents('log', $result);
        $result_code = $result['result_code'];
        if ("SUCCESS" == $result_code) {
            $order = Order::find()->where(['num' => $result['out_trade_no']])->one();
            $user = UserInfo::find()->where(['open_id' => $result['openid']])->one();
            $user_id = $user->id;
            if ($order->type == 1 && $order->status != 2) {
                $card_id = $order->aim_id;
                $card = Card::find()->where(['id' => $card_id])->one();
                $this->bind_card($user_id, $user, $card_id, $card);
                $order->status = 2;
                $order->save();
            } elseif ($order->type == 2 && $order->status != 2) {
                $this->enroll_event($user, $order->aim_id);
                $order->status = 2;
                $order->save();
            }
        }
    }

    /**
     * 开通会员卡
     * @param $user_id
     * @param $user
     * @param $card_id
     * @param $card
     * @return UserCard
     */
    function bind_card($user_id, $user, $card_id, $card)
    {
        $user_card = new UserCard();
        $user_card->user_id = $user_id;
        $user_card->card_id = $card_id;
        $user_card->user_name = $user->username;
        $user_card->open_id = $user->open_id;
        $user_card->card_name = $card->name;
        $user_card->card_num = rand(100000, 999999) . 'vip_card';
        $user_card->valid_time_start = $card->valid_time_start;
        $user_card->valid_time_end = $card->valid_time_end;
        $user_card->cipher = rand(100000, 999999);
        $user_card->max_coupon_num = $card->allow_coupon_num;
        $user_card->stay_coupon_num = $card->allow_coupon_num;
        $user_card->save();
        return $user_card;
    }

    /**
     * 报名付费活动
     * @param $user
     * @param $event_id
     */
    public function enroll_event($user, $event_id)
    {
        $event = Event::findOne($event_id);
        $enroll = new EventEnroll();
        $enroll->user_id = $user->id;
        $enroll->user_name = $user->child_name;
        $enroll->event_id = $event_id;
        $enroll->event_name = $event->name;
        $enroll->save();
    }
}



