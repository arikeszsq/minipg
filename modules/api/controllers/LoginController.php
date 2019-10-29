<?php


namespace app\modules\api\controllers;

use app\Lib\wechat\WXBizDataCrypt;
use app\models\UserInfo;
use app\modules\api\services\LoginService;
use app\modules\api\traits\TokenTrait;
use EasyWeChat\Factory;
use Yii;
use yii\web\Controller;


class LoginController extends Controller
{
    use TokenTrait;

    public function actionIndex()
    {
        $APPID = Yii::$app->params['MINI_APPID'];
        $AppSecret = Yii::$app->params['MINI_APP_SECRET'];
        $inputs = Yii::$app->request->get();
        $code = $inputs['code'];
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=" . $APPID . "&secret=" . $AppSecret . "&js_code=" . $code . "&grant_type=authorization_code";
        $arr = file_get_contents($url);
        $arr = json_decode($arr, true);
        $openid = $arr['openid'];
        $user_info = UserInfo::find()->where(['open_id'=>$openid])->one();
        if(empty($user_info)){
            $user_info = new UserInfo();
        }
        $user_info->open_id = $openid;
        if ($user_info->save()) {
            $token = $this->encrypt($openid);
            return json_encode(['code' => 200, 'message' => 'OK', 'token' => $token, 'data' => $arr]);
        }
        return json_encode(['code' => 100, 'message' => '登陆失败']);
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