<?php

namespace app\modules\api\controllers;

use app\models\Card;
use app\models\ConsumLog;
use app\models\Coupon;
use app\models\Event;
use app\models\Order;
use app\models\UserCard;
use app\models\UserCoupon;
use app\modules\api\traits\WeChatTrait;
use Yii;

class PayController extends BaseController
{
    use WeChatTrait;

    /**
     * 微信支付第一次签名，获取prepay_id
     * @return array
     */
    public function actionIndex()
    {
        if (!Yii::$app->request->isPost) {
            return [
                'code' => 101,
                'msg' => '请求方式错误'
            ];
        }
        $ret = $this->requireLogin();
        if ($ret['code'] != 200) {
            return $ret;
        }
        $openid = $ret['open_id'];
        $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
        $app_id = Yii::$app->params['MINI_APPID'];
        $mch_id = Yii::$app->params['MCH_ID'];
        $nonce_str = $this->getRandChar(32);
        $data["appid"] = $app_id;
        $data["mch_id"] = $mch_id;
        $params = Yii::$app->request->post();
        //1:会员卡支付 2.活动支付
        $type = $params['type'];
        $id = $params['id'];
        if ($type == 1) {
            $data["body"] = '开通会员卡';
            $obj = Card::find()->where(['id' => $id])->one();
            $params['total_fee'] = $obj->price;
        } else {
            $data["body"] = '报名付费活动';
            $obj = Event::find()->where(['id' => $id])->one();
            $params['total_fee'] = $obj->price;
        }

        $data["nonce_str"] = $nonce_str;
        $data["out_trade_no"] = time();
        $data["total_fee"] = intval($params['total_fee'] * 100);
        $data["spbill_create_ip"] = $this->get_client_ip();
        $data["notify_url"] = 'https://miniprogram.kan0512.com/api/notify/index';
        $data["trade_type"] = "JSAPI";
        $data["openid"] = $openid;
        $sign = $this->getSign($data);
        $data["sign"] = $sign;
        $xml = $this->arrayToXml($data);
        $response = $this->postXmlCurl($xml, $url);
        $result = $this->xmlstr_to_array($response);
        if ($result['return_code'] == 'SUCCESS') {
            $order = new Order();
            $order->aim_id = $id;
            $order->num = $data["out_trade_no"];
            $order->money = $data['total_fee'];
            $order->type = $type;
            $order->open_id = $openid;
            $order->is_used = 1;
            $order->status = 1;
            $order->save();
        }
        $data = $this->getPayInfo($app_id, $result['prepay_id']);
        return $data;
    }

    /**
     * 微信再次签名，把五个参数返回给小程序
     * @param $app_id
     * @param $prepay_id
     * @return mixed
     */
    public function getPayInfo($app_id, $prepay_id)
    {
        $signData['appId'] = $app_id;
        $signData['nonceStr'] = $this->getRandChar(32);
        $signData['package'] = 'prepay_id=' . $prepay_id;
        $signData['signType'] = 'MD5';
        $signData['timeStamp'] = (string)time();
        $sign = $this->getSign($signData);
        $signData['paySign'] = $sign;
        unset($signData['appId']);
        return $signData;
    }

    /**
     * 购买会员卡成功，成为会员，同时发放会员卡对应的优惠券
     * @return array|\yii\db\ActiveRecord|null
     */
    public function actionGetCard()
    {
        $ret = $this->requireLogin();
        if ($ret['code'] != 200) {
            return $ret;
        }
        $open_id = $ret['open_id'];
        $user = $this->getUser($open_id);
        $user_id = $user->id;
        $user = $this->getUser($user_id);
        $inputs = Yii::$app->request->post();
        $card_id = $inputs['card_id'];
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $user_card = new UserCard();
            $user_card->card_id = $card_id;
            $user_card->user_id = $user_id;
            $user_card->save();
            $coupons = Coupon::find()->where(['card_id' => $card_id])->all();
            foreach ($coupons as $coupon) {
                $user_coupon = new UserCoupon();
                $user_coupon->user_id = $user_id;
                $user_coupon->username = $user->username;
                $user_coupon->coupon_id = $coupon->id;
                $user_coupon->coupon_name = $coupon->name;
                $user_coupon->total_num = $coupon->total_num;
                $user_coupon->stay_num = $coupon->total_num;
                $user_coupon->save();
            }
        } catch (\Exception $e) {
            $transaction->rollBack();
        }
    }

    /**
     * 用户使用核销码
     * @return array
     */
    public function actionUseCheckCode()
    {
        $ret = $this->requireLogin();
        if ($ret['code'] != 200) {
            return $ret;
        }
        $open_id = $ret['open_id'];
        $user = $this->getUser($open_id);
        $user_id = $user->id;
        $inputs = Yii::$app->request->post();
        $check_code = $inputs['check_code'];
        if (empty($check_code)) {
            return [
                'code' => 103,
                'msg' => '核销码必填'
            ];
        }
        $coupon_id = $inputs['coupon_id'];
        if (empty($coupon_id)) {
            return [
                'code' => 104,
                'msg' => '优惠码id必填'
            ];
        }
        $coupon = Coupon::find()->where(['id' => $coupon_id])->one();
        if ($coupon->check_code != $check_code) {
            return [
                'code' => 101,
                'msg' => '核销码输入错误'
            ];
        }
        $user_coupon = UserCoupon::find()->where(['user_id' => $user_id])->one();
        if ($user_coupon->stay_num <= 0) {
            return [
                'code' => 102,
                'msg' => '您的没有优惠券了！！！'
            ];
        }
        $user_coupon->stay_num = $user_coupon->stay_num - 1;

        if ($user_coupon->save()) {
            $log = new ConsumLog();
            $business_name = $coupon->business_name;
            $log->add_log($user_id, $user->username, $business_name);
            return [
                'code' => 200,
                'msg' => '消费成功！！！'
            ];
        }
    }
}