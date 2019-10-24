<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventEnrollSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '活动报名表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-enroll-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_name',
            'event_name',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
