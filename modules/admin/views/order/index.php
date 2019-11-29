<?php

use app\models\Order;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '订单';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'user_name',
            'num',
            [
                'header' => '状态',
                'format' => 'raw',
                'value' => function ($model) {
                    if (intval($model->status) == Order::Status_待支付) {
                        return '<span style="color: red;">待支付</span>';
                    } elseif (intval($model->status) == Order::Status_支付成功) {
                        return '<span style="color: yellowgreen;">支付完成</span>';
                    } else {
                        return '<span style="color: yellow;">未知</span>';
                    }
                },
            ],
            [
                'header' => '消费类型',
                'format' => 'raw',
                'value' => function ($model) {
                    if (intval($model->type) == Order::Type_开通会员卡) {
                        return '<span style="color: blue;">开通会员卡</span>';
                    } elseif (intval($model->type) == Order::Type_活动报名) {
                        return '<span style="color: blueviolet;">活动报名</span>';
                    } else {
                        return '<span style="color: yellow;">未知</span>';
                    }
                },
            ],
            'money',
            //'open_id',
            //'is_used',
            'created_at',
            'updated_at',
        ],
    ]); ?>


</div>
