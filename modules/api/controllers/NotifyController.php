<?php


namespace app\modules\api\controllers;


use app\models\Order;
use app\modules\api\traits\WeChatTrait;

class NotifyController extends BaseController
{
    use WeChatTrait;

    public function actionIndex()
    {
        var_dump($_REQUEST);
        $xml = file_get_contents('php://input');
        libxml_disable_entity_loader(true);
        $result = $this->xmlstr_to_array($xml);
        $result_code = $result['result_code'];
    }

}