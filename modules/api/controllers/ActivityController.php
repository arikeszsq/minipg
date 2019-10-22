<?php


namespace app\modules\api\controllers;


use app\models\Activity;
use app\models\UserActivityCollect;
use app\models\UserActivityEnroll;
use Yii;

class ActivityController extends BaseController
{
    /**
     * 活动列表
     * @return array|\yii\db\ActiveRecord|null
     */
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
        $is_hot = $inputs['is_hot'];
        $is_selected = $inputs['is_selected'];
        $query = Activity::find();
        $total_count = $query->count();
        $total_page = ceil($total_count / $per_page);
        $offset = ($page - 1) * $per_page;
        $activities = $query
            ->andFilterWhere(['is_hot' => $is_hot])
            ->andFilterWhere(['is_selected' => $is_selected])
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

    /**
     * 收藏活动
     * @return array|\yii\db\ActiveRecord|null
     */
    public function actionCollect()
    {
        $user = $this->requireLoginUser();
        if ($user['code'] != 200) {
            return $user;
        } else {
            $user_id = $user['user_id'];
        }
        $activity_id = Yii::$app->request->post('activity_id');
        $user_activity_collect = new UserActivityCollect();
        $user_activity_collect->user_id = $user_id;
        $user_activity_collect->activity_id = $activity_id;
        if ($user_activity_collect->save()) {
            return [
                'code' => 200,
                'msg' => '收藏成功'
            ];
        } else {
            return [
                'code' => 100,
                'msg' => '收藏失败'
            ];
        }
    }

    /**
     * 活动报名
     * @return array|\yii\db\ActiveRecord|null
     */
    public function actionEnroll()
    {
        $user = $this->requireLoginUser();
        if ($user['code'] != 200) {
            return $user;
        } else {
            $user_id = $user['user_id'];
        }
        $activity_id = Yii::$app->request->post('activity_id');
        $user_activity_enroll = new UserActivityEnroll();
        $user_activity_enroll->user_id = $user_id;
        $user_activity_enroll->activity_id = $activity_id;
        if ($user_activity_enroll->save()) {
            return [
                'code' => 200,
                'msg' => '收藏成功'
            ];
        } else {
            return [
                'code' => 100,
                'msg' => '收藏失败'
            ];
        }
    }

}