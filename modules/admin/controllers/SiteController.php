<?php

namespace app\modules\admin\controllers;

use app\models\Admin;
use app\modules\api\traits\TokenTrait;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;

class SiteController extends Controller
{
    use TokenTrait;
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new LoginForm();
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            $params = Yii::$app->request->post()['LoginForm'];
            $username = $params['username'];
            $password = $params['password'];
            $admin = new Admin;
            $user = $admin->getAdmin($username);
            if(empty($user)){
                Yii::$app->session->setFlash('success', '账号不存在');
                return $this->refresh();
            }
            if ($admin->_password($password) != $user->password) {
                Yii::$app->session->setFlash('success', '密码不正确，请重新输入！');
                return $this->refresh();
            }
            if ($admin->_password($password) == $user->password) {
                Yii::$app->session['token'] = $this->encrypt($user->id);
                return $this->redirect('/admin/event/index');
            }
            return $this->redirect('/admin/event/index');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->session['user_name']='';
        Yii::$app->session['token']='';

        return $this->goHome();
    }
}
