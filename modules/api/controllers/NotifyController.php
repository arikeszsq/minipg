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
            $order->status = 2;
            $order->save();
            $user = UserInfo::find()->where(['open_id' => $result['openid']])->one();
            $user_id = $user->id;
            if ($order->type == 1) {
                $card_id = $order->aim_id;
                $card = Card::find()->where(['id' => $card_id])->one();
                $this->bind_card($user_id, $user, $card_id, $card);
                $this->bind_coupon($user, $card_id);
            } elseif ($order->type == 2) {
                $this->enroll_event($user, $order->aim_id);
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
        $user_card->user_name = $user->username;
        $user_card->open_id = $user->open_id;
        $user_card->card_id = $card_id;
        $user_card->card_name = $card->name;
        $user_card->card_num = rand(10000000, 99999999) . 'vip_card';
        $user_card->valid_time_start = $card->valid_time_start;
        $user_card->valid_time_end = $card->valid_time_end;
        $user_card->valid_time = $card->valid_time_start . '-' . $card->valid_time_end;
        $user_card->cipher = rand(100000, 999999);
        $user_card->save();
        return $user_card;
    }


    /**
     * 开通会员卡后，发放优惠券
     * @param $user
     * @param $card_id
     */
    function bind_coupon($user, $card_id)
    {
        $coupons = Coupon::find()->where(['card_id' => $card_id])->all();
        if ($coupons) {
            foreach ($coupons as $coupon) {
                $user_coupon = new UserCoupon();
                $user_coupon->user_id = $user->id;
                $user_coupon->username = $user->username;
                $user_coupon->coupon_id = $coupon->id;
                $user_coupon->coupon_name = $coupon->name;
                $user_coupon->status = Coupon::Status_有效;
                $user_coupon->total_num = $coupon->total_num;
                $user_coupon->stay_num = $coupon->total_num;
                $user_coupon->save();
            }
        }
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



