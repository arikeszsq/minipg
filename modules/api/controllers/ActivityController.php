<?php


namespace app\modules\api\controllers;


use app\models\Activity;
use app\models\UserInfo;
use Yii;

class ActivityController extends BaseController
{
    public function actionLists()
    {
        $user = $this->requireLoginUser();
        if ($user['code'] != 200) {
            return $user;
        } else {
            $user_id = $user['user_id'];
        }
        $user = $this->getUser($user_id);
        $inputs = Yii::$app->request->get();
        $page = $inputs['page'] ?? 1;
        $per_page = $inputs['per_page'] ?? 10;
        $query = Activity::find();
        $total_count = $query->count();
        $total_page = ceil($total_count / $per_page);
        $offset = ($page - 1) * $per_page;
        $activities = $query
            ->offset($offset)
            ->limit($per_page)
            ->all();
        return [
            'code' => 200,
            'msg' => '获取成功',
            'data' => [
                'total_count' => $total_count,
                'total_page' => $total_page,
                'detail_list' => $activities,
            ],
        ];

    }

}