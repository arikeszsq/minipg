<?php


namespace app\modules\api\controllers;

use app\Lib\wechat\WXBizDataCrypt;
use app\modules\api\services\LoginService;
use Yii;
use yii\web\Controller;


class LoginController extends Controller
{
    public function actionIndex()
    {
//        $code='001mn79R11vDx21E889R1kQh9R1mn79G';
//        $encryptedData = '6zucmt7Z5CpcrTGvVYucisnkpv3LIAMWhCRlRIvczUvnlkoQcdhWkeoXufLVdAbKBulZcE/JMDPikzDJO2C4sEbBlRzauIMgOPQAfRE5VugZMKgoJBenYcwdkp7osgI4noTFkMJhSXwwM/XySB3mRqeqA5yOV0eGf+lmO5Auhk7+LGofUquv16HMvIBFdSzAbK05Mor37G5cAUPDnoyesiQCp6zV5ZrVlJtB4IcRCXbN4kMGfrt+14gP8OqLrlc/iw5fNyszdBH7id3SubXxDFHT3rqaPM8ovobU6uK9KZ/iWTC4l+VWlGIR/KnlbidRBPDY7ENb36eIFTDNPLG8faEX+r1uIUvh9BPottU2JXrPOUN5KfHiS5cPnSMoE5+sN7+8aB+kMmG20/lR4pynV1WqXO2c/HmZgjhQ4eQK7dcYNUGdPNzokzd6tQbexwWlHhLxSBvyewHJn4TM/URw7T+qWUpsewwTSYhmfO80D5qj1JfaxkzJ1/3SWMUWLjWcKsqndpAgXfGL+UoiNQBToA==';
//        $iv = 'NS+wpupsyrMd6cR0ulh52A==';
//        $APPID = 'wxf2472d1dfb9e6015';
//        $AppSecret = '4118957f24fc4bd49ae2383e424bdb58';
        $APPID = Yii::$app->params['MINI_APPID'];
        $AppSecret = Yii::$app->params['MINI_APP_SECRET'];
        $inputs = Yii::$app->request->get();
        $code = $inputs['code'];
        $encryptedData = $inputs['encryptedData'];
        $iv = $inputs['iv'];
//        $signature = $inputs('signature');
//        $rawData = $inputs['rawData'];
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=" . $APPID . "&secret=" . $AppSecret . "&js_code=" . $code . "&grant_type=authorization_code";
        $arr = file_get_contents($url);
        $arr = json_decode($arr, true);
//        $openid = $arr['openid'];
        $session_key = $arr['session_key'];
//        $session_key = 'MLKLMz5RuKap8mQJZC2dIw==';
//        // 数据签名校验
//        $signature2 = sha1($rawData . $session_key);
//        if ($signature != $signature2) {
//            return [
//                'code' => 500,
//                'msg' => '数据签名验证失败！'
//            ];
//        }
        $pc = new WXBizDataCrypt($APPID, $session_key);
        $errCode = $pc->decryptData($encryptedData, $iv, $data); //其中$data包含用户的所有数据
//        $user_info = json_decode($data);
        if ($errCode == 0) {
            $login_service = new LoginService();
            $result = $login_service->login($data);
            return json_encode(['code' => 200, 'message' => 'OK', 'data' => $result]);
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
            return json_encode(['code' => 200, 'message' => 'OK', 'data' => $user_info]);
        } else {
            return $err_code;
        }
    }

}