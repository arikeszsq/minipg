<?php


namespace app\modules\api\controllers;

use app\modules\api\services\LoginService;
use Lib\Minipg\WXBizDataCrypt;
use Yii;
use yii\web\Controller;

class LoginController extends Controller
{
    public function actionIndex()
    {
        $APPID = Yii::$app->params['MINI_APPID'];
        $AppSecret = Yii::$app->params['MINI_APP_SECRET'];
        $inputs = Yii::$app->request->post();
        $code = $inputs['code'];
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=" . $APPID . "&secret=" . $AppSecret . "&js_code=" . $code . "&grant_type=authorization_code";
        $arr = file_get_contents($url);
        $arr = json_decode($arr, true);
        $openid = $arr['openid'];
        $session_key = $arr['session_key'];
        // 数据签名校验
        $signature = $inputs('signature');
        $rawData = $inputs['rawData'];
        $signature2 = sha1($rawData . $session_key);
        if ($signature != $signature2) {
            return [
                'code' => 500,
                'msg' => '数据签名验证失败！'
            ];
        }
        $encryptedData = $inputs['encryptedData'];
        $iv = $inputs['iv'];
        $pc = new WXBizDataCrypt($APPID, $session_key);
        $errCode = $pc->decryptData($encryptedData, $iv, $data); //其中$data包含用户的所有数据
        $user_info = json_decode($data);
        if ($errCode == 0) {
            $login_service = new LoginService();
            $result = $login_service->login($user_info);
            return [
                'code' => 200,
                'message' => 'OK',
                'data' => $result
            ];
        } else {
            echo $errCode;
        }
    }

    public function actionGetMobile()
    {
        $encrypted_data = $_POST['encrypted_data'];
        $iv = $_POST['iv'];
        $js_code = $_POST['code'];
        $app_id = Yii::$app->params['MINI_APPID'];
        $secret = Yii::$app->params['MINI_APP_SECRET'];
        $grant_type = 'authorization_code';
        $obj_session = file_get_contents("https://api.weixin.qq.com/sns/jscode2session?appid=$app_id&secret=$secret&js_code=$js_code&grant_type=$grant_type");
        $session_key = json_decode($obj_session)->session_key;
        $pc = new WXBizDataCrypt($app_id, $session_key);
        $err_code = $pc->decryptData($encrypted_data, $iv, $data);
        if ($err_code == 0) {
            $user_info = json_decode($data, true);
            return [
                'code' => 200,
                'message' => 'OK',
                'data' => $user_info
            ];
        } else {
            return $err_code;
        }
    }

}