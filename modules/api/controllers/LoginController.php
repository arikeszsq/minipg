<?php


namespace app\modules\api\controllers;


use app\models\User;
use Lib\Minipg\WXBizDataCrypt;
use Yii;
use yii\web\Controller;

class LoginController extends Controller
{
    public function actionIndex()
    {
        $encrypted_data = $_POST['encrypted_data'];
        $iv = $_POST['iv'];
        $js_code = $_POST['code'];

        $appId = Yii::$app->params['MINI_APPID'];
        $secret = Yii::$app->params['MINI_APP_SECRET'];
        $grant_type = 'authorization_code';
        $objSession = file_get_contents("https://api.weixin.qq.com/sns/jscode2session?appid=$appId&secret=$secret&js_code=$js_code&grant_type=$grant_type");
        $session_key = json_decode($objSession)->session_key;
        $pc = new WXBizDataCrypt($appId, $session_key);
        $errCode = $pc->decryptData($encrypted_data, $iv, $data);
        if ($errCode == 0) {
            $mobile = json_decode($data, true)['phoneNumber'] ?? '';
            $user_info = $this->login($mobile);
            return $this->ret_obj($user_info);
        } else {
            return $errCode;
        }
    }

    function login($mobile)
    {

    }

}