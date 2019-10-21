<?php


namespace app\modules\api\controllers;


use app\models\UserInfo;
use Yii;

class UserInfoController extends BaseController
{
    public function actionAdd()
    {
        $user_info = new UserInfo();
        $user_info->load(Yii::$app->request->post());
        if ($user_info->save()) {
            return [
                'code' => 200,
                'msg' => '保存成功',
                'data' => $user_info
            ];
        } else {
            return [
                'code' => 101,
                'msg' => '保存失败'
            ];
        }
    }


}