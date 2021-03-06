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
            'user_id',
            'username',
            'coupon_name',
            'everyone_max_num',
            'already_get_num',
            'stay_get_num',
            'stay_num' ,
            'created_at',
        ],
    ]); ?>


</div>
