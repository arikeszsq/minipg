<?php


namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    public $layout = '../layouts/main';

    public function beforeAction($action)
    {
        $is_guest = Yii::$app->user->isGuest;
        if ($is_guest) {
            return $this->redirect('/admin/site/login');
        }
        return parent::beforeAction($action);
    }
}