<?php

use app\models\Event;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '活动';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <p>
        <?= Html::a('新建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                "format" => 'raw',
                'value' => function ($model) {
                    return Html::img($model->logo_url, ["width" => "30", "height" => "30"]);
                },
            ],
            'name',
//            'card_name',
            'address',
            'price',
//            'is_hot',
//            'is_recommand',
//            'need_vip',
            'start_time',
//            'end_time',
//            'created_at',
            [
                'format' => 'raw',
                'value' => function ($model) {
                    if (intval($model->status) == Event::Status_未开始) {
                        return '<span style="color: red;">未开始</span>';
                    } elseif (intval($model->status) == Event::Status_进行中) {
                        return '<span style="color: blueviolet;">进行中</span>';
                    } else {
                        return '<span style="color: yellowgreen;">已结束</span>';
                    }
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
