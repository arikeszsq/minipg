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
        $inputs = Yii::$app->request->get();
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
     * 活动报名
     * @return array
     */
    public function actionEnroll()
    {
        $ret = $this->requireLogin();
        if ($ret['code'] != 200) {
            return $ret;
        }
        $user_id = $ret['user_id'];
        $inputs = Yii::$app->request->post();
        $event_id = $inputs['event_id'];
        $event = Event::findOne($event_id);
        if ($event->need_vip == Event::Vip_需要) {
            $user_cards = UserCard::find()
                ->where(['user_id'=>$user_id])
                ->andWhere(['valid_time_end','>',$event->created_at])
                ->asArray()
                ->all();
            if(count($user_cards)<=0){
                return [
                    'code' => 102,
                    'msg' => '没有报名资格，请先开通会员卡'
                ];
            }
        }
        $enroll = new EventEnroll();
        $enroll->user_id = $user_id;
        $enroll->event_id = $event_id;
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