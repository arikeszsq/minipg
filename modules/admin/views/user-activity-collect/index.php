<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserActivityCollectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '活动收藏';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-activity-collect-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'activity_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
