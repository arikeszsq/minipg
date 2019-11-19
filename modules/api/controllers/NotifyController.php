<?php


namespace app\modules\api\controllers;


use app\models\Order;
use app\modules\api\traits\WeChatTrait;

class NotifyController extends BaseController
{
    use WeChatTrait;

    public function actionIndex()
    {
        $xml = file_get_contents('php://input');
        libxml_disable_entity_loader(true);
        $result = $this->xmlstr_to_array($xml);
        $result_code = $result['result_code'];
        if ("SUCCESS" == $result_code) {
            $out_trade_no = $result_code['out_trade_no'];
            $order = new Order();
            $order->num = $out_trade_no;
            $order->money = $result_code['total_fee'];
            $order->save();
        }
    }

}