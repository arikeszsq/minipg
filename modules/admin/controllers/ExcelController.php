<?php


namespace app\modules\admin\controllers;


use app\models\Event;
use app\models\EventEnroll;
use moonland\phpexcel\Excel;

class ExcelController extends BaseController
{
    public function actionOut()
    {
        $id = $_GET['id'];
        $event = Event::find()->where(['id' => $_GET])->one();
        $name = $event->name;
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition:attachment;filename=$name.xls");
        $event_enrolls = EventEnroll::find()
            ->where(['event_id' => $id])
            ->with('userinfo')
            ->all();
        Excel::export([
            'models' => $event_enrolls,
            'columns' => [
                'userinfo.username',
                'userinfo.phone',
                'event_name',
            ],
            'headers' => [
                'userinfo.username' => '姓名',
                'userinfo.phone' => '手机号',
                'created_at' => '创建时间',
                'updated_at' => '更新时间',
                'event_name' => '活动名称',
            ],
        ]);
    }
}