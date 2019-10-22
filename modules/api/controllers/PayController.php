<?php


namespace app\modules\api\controllers;


use app\models\Coupon;
use app\models\UserCard;
use app\models\UserCoupon;
use app\modules\api\traits\WeChatTrait;
use App\Util\WXPay;
use Yii;

class PayController extends BaseController
{
    use WeChatTrait;

    public function index($openid, $body, $order_no, $total_fee, $notify_url)
    {
        $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
        $app_id = Yii::$app->params['MINI_APPID'];
        $mch_id = Yii::$app->params['MCH_ID'];
        $nonce_str = $this->getRandChar(32);
        $data["appid"] = $app_id;
        $data["mch_id"] = $mch_id;
        $data["nonce_str"] = $nonce_str;
        $data["notify_url"] = $notify_url;
        $data["body"] = $body;
        $data["out_trade_no"] = $order_no;
        $data["spbill_create_ip"] = $this->get_client_ip();
        $data["total_fee"] = $total_fee;
        $data["trade_type"] = "JSAPI";
        $data["openid"] = $openid;
        $sign = $this->getSign($data);
        $data["sign"] = $sign;
        $xml = $this->arrayToXml($data);
        $response = $this->postXmlCurl($xml, $url);
        //将微信返回的结果xml转成数组
        return $this->xmlstr_to_array($response);
    }

    /**
     * 购买会员卡成功，同时发放会员卡对应的优惠券
     * @return array|\yii\db\ActiveRecord|null
     */
    public function actionGetCard()
    {
        $user = $this->requireLoginUser();
        if ($user['code'] != 200) {
            return $user;
        } else {
            $user_id = $user['user_id'];
        }
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
        $user = $this->requireLoginUser();
        if ($user['code'] != 200) {
            return $user;
        } else {
            $user_id = $user['user_id'];
        }
        $inputs = Yii::$app->request->post();
        $check_code = $inputs['check_code'];
        $coupon_id = $inputs['coupon_id'];
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
            return [
                'code' => 200,
                'msg' => '消费成功！！！'
            ];
        }

    }
}