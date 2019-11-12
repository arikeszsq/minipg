<?php


namespace app\modules\api\controllers;


use app\models\Event;
use app\models\EventEnroll;
use app\models\UserCard;
use Yii;

class EventController extends BaseController
{
    /**
     * 活动列表
     * @return array|\yii\db\ActiveRecord|null
     */
    public function actionLists()
    {
        $inputs = Yii::$app->request->post();
        $page = $inputs['page'] ?? 1;
        $per_page = $inputs['per_page'] ?? 10;
        $is_hot = $inputs['is_hot'] ?? null;
        $is_selected = $inputs['is_selected'] ?? null;
        $status = $inputs['status'] ?? null;
        $need_vip = $inputs['need_vip'] ?? null;
        $query = Event::find();
        $total_count = $query->count();
        $total_page = ceil($total_count / $per_page);
        $offset = ($page - 1) * $per_page;
        $activities = $query
            ->andFilterWhere(['status' => $status])
            ->andFilterWhere(['is_hot' => $is_hot])
            ->andFilterWhere(['is_selected' => $is_selected])
            ->andFilterWhere(['need_vip' => $need_vip])
            ->offset($offset)
            ->limit($per_page)
            ->orderBy('status DESC')
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
     * 活动详情
     * @return array
     */
    public function actionDetail()
    {
        $inputs = Yii::$app->request->get();
        $id = $inputs['id'] ?? 1;
        if (empty($id)) {
            return [
                'code' => 101,
                'msg' => '活动id必填'
            ];
        }
        $query = Event::find();
        $activity = $query
            ->where(['id' => $id])
            ->one();
        return [
            'code' => 200,
            'msg' => '获取成功',
            'data' => $activity
        ];
    }

    /**
     * 活动报名
     * @return array
     */
    public function actionEnroll()
    {
        $ret = $this->requireLogin();
        if ($ret['code'] != 200) {
            return $ret;
        }
        $open_id = $ret['open_id'];
        $user = $this->getUser($open_id);
        if (empty($user->child_name)) {
            return [
                'code' => 105,
                'msg' => '请先完善用户信息'
            ];
        }
        $user_id = $user->id;
        $inputs = Yii::$app->request->post();
        $event_id = $inputs['event_id'];
        if (empty($event_id)) {
            return [
                'code' => 103,
                'msg' => 'event_id必填！！！'
            ];
        }
        $event = Event::findOne($event_id);
        if ($event->status == Event::Status_已结束) {
            return [
                'code' => 104,
                'msg' => '活动报名已结束！！'
            ];
        }
        if ($event->need_vip == Event::Vip_需要) {
            $user_cards = UserCard::find()
                ->where(['user_id' => $user_id])
                ->andWhere(['>', 'valid_time_end', $event->created_at])
                ->asArray()
                ->all();
            if (count($user_cards) <= 0) {
                return [
                    'code' => 102,
                    'msg' => '没有报名资格，请先开通会员卡'
                ];
            }
        }
        $enroll = new EventEnroll();
        $enroll->user_id = $user_id;
        $enroll->user_name = $user->child_name;
        $enroll->event_id = $event_id;
        $enroll->event_name = $event->name;
        if ($enroll->save()) {
            return [
                'code' => 200,
                'msg' => '报名成功'
            ];
        } else {
            return [
                'code' => 101,
                'msg' => '报名失败'
            ];
        }
    }

}