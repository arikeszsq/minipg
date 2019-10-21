<?php


namespace app\modules\api\controllers;


use app\modules\api\traits\WeChatTrait;
use App\Util\WXPay;
use Yii;

class PayController extends BaseController
{
    use WeChatTrait;

    public function index($openid,$body, $order_no, $total_fee,$notify_url)
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
}