<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserActivityEnrollSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '活动报名表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-activity-enroll-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_name',
            'activity_name',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
