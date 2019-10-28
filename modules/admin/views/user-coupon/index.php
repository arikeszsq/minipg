<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserCouponSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户优惠券';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-coupon-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            'coupon_name',
            'total_num',
            'stay_num',
            'created_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
