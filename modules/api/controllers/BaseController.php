<?php


namespace app\modules\api\controllers;


use Yii;
use yii\web\Controller;
use yii\web\Response;

class BaseController extends Controller
{
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
}