<?php


namespace app\modules\api\controllers;


use app\models\UserCard;
use app\models\UserInfo;
use Yii;

class UserInfoController extends BaseController
{
    /**
     * 修改用户资料
     * @return array
     */
    public function actionUpdate()
    {
        $ret = $this->requireLogin();
        if ($ret['code'] != 200) {
            return $ret;
        }
        $open_id = $ret['open_id'];
        $user = $this->getUser($open_id);
        $user->load(Yii::$app->request->post());
        if ($user->save()) {
            return [
                'code' => 200,
                'msg' => '成功',
                'data' => $user
            ];
        } else {
            return [
                'code' => 101,
                'msg' => '失败'
            ];
        }
    }

    /**
     * 用户详情
     * @return array
     */
    public function actionDetail()
    {
        $ret = $this->requireLogin();
        if ($ret['code'] != 200) {
            return $ret;
        }
        $open_id = $ret['open_id'];
        $user = $this->getUser($open_id);
        if ($user) {
            return [
                'code' => 200,
                'msg' => '成功',
                'data' => $user
            ];
        } else {
            return [
                'code' => 101,
                'msg' => '失败'
            ];
        }
    }

}