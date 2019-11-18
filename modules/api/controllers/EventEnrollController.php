<?php


namespace app\modules\api\controllers;


use app\models\EventEnroll;

class EventEnrollController extends BaseController
{
    public function actionMyLists()
    {
        $ret = $this->requireLogin();
        if ($ret['code'] != 200) {
            return $ret;
        }
        $open_id = $ret['open_id'];
        $user = $this->getUser($open_id);
        $lists = EventEnroll::find()->where(['user_id' => $user->id])->all();
        return [
            'code' => 200,
            'msg' => '成功',
            'data' => $lists
        ];
    }

}