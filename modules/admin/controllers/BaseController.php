<?php


namespace app\modules\admin\controllers;

use app\models\Admin;
use app\modules\api\traits\TokenTrait;
use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    use TokenTrait;
    public $layout = '../layouts/main';

    public function beforeAction($action)
    {
        $admin = '';
        $token = Yii::$app->session['token'];
        if (isset($token) && !empty($token)) {
            $id = $this->decrypt($token);
            $admin = Admin::findOne($id);
            if (empty($admin)) {
                return $this->redirect('/admin/site/login');
            }else{
                Yii::$app->session['user_name']=$admin->user_name;
            }
        }
        if (empty($admin)) {
            return $this->redirect('/admin/site/login');
        }
        return parent::beforeAction($action);
    }

}