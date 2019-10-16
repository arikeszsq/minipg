<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CouponSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coupons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coupon-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Coupon', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'business_id',
            'business_name',
            'pic_url:url',
            'name',
            //'description',
            //'tag',
            //'suitable_age_end',
            //'suitable_age_start',
            //'suitable_age',
            //'price',
            //'total_num',
            //'status',
            //'valid_time',
            //'valid_time_start',
            //'valid_time_end',
            //'using_flow',
            //'using_detail',
            //'check_code',
            //'created_at',
            //'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
