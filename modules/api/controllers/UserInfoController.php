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
    public function actionAdd()
    {
        $ret = $this->requireLogin();
        if ($ret['code'] != 200) {
            return $ret;
        }
        $open_id = $ret['open_id'];
        $user = $this->getUser($open_id);
        $posts = Yii::$app->request->post();
        $user->username = $posts['username'] ?? '';
        $user->real_name = $posts['real_name'] ?? '';
        $user->phone = $posts['phone'] ?? '';
        $user->parent_name = $posts['parent_name'] ?? '';
        $user->parent_mobile = $posts['parent_mobile'] ?? '';
        $user->child_name = $posts['child_name'] ?? '';
        $user->child_gender = $posts['child_gender'] ?? '';
        $user->child_birthday = $posts['child_birthday'] ?? '';
        $user->child_age = $posts['child_age'] ?? '';
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