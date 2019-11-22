<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserCardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户会员卡';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-card-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
//            'open_id',
            'user_name',
            'card_name',
            'card_num',
            //'status',
            'valid_time_start',
            'valid_time_end',
            //'valid_time',
            'cipher',
            'created_at',
            //'updated_at',
            //'deleted_at',

        ],
    ]); ?>


</div>
