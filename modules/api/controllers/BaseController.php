<?php


namespace app\modules\api\controllers;

use app\models\UserInfo;
use app\modules\api\traits\TokenTrait;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class BaseController extends Controller
{
    use TokenTrait;
    public $layout = false;
    public $enableCsrfValidation = false;
    public $formSubmit = false;
    protected $jsoncallback = '';

    public function afterAction($action, $result)
    {
        if ($this->formSubmit) {
            Yii::$app->response->format = Response::FORMAT_HTML;
            $result = "<script></script>";
        }
        $this->jsoncallback = Yii::$app->request->get('jsoncallback', '');
        if ($this->jsoncallback) {
            Yii::$app->response->format = Response::FORMAT_JSONP;
            $result = ['callback' => $this->jsoncallback, 'data' => $result];
        } else {
            if (Yii::$app->response->format != Response::FORMAT_RAW) {
                Yii::$app->response->format = Response::FORMAT_JSON;
            }
        }
        return parent::afterAction($action, $result);
    }

    public function requireLogin()
    {
        if (isset($_REQUEST['token']) && !empty($_REQUEST['token'])) {
            $token = $_REQUEST['token'];
            $open_id = $this->decrypt($token);
            if ($open_id) {
                return [
                    'code' => 200,
                    'open_id' => $open_id
                ];
            } else {
                return [
                    'code' => 101,
                    'msg' => 'token错误！'
                ];
            }
        } else {
            return [
                'code' => 100,
                'msg' => 'token必填！'
            ];
        }
    }

    public function getUser($open_id)
    {
        $user_info = UserInfo::find()->where(['open_id' => $open_id])->one();
        return $user_info;
    }
}