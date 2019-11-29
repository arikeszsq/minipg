<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '会员卡';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-index">

    <p>
        <?= Html::a('新建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
//            'description',
//            'status',
            //'valid_time_start',
            //'valid_time_end',
            //'valid_time',
            //'pic_url:url',
            'price',
            //'origin_price',
            //'count',
            //'sale_max_num',
            //'already_sale_num',
            //'stay_num',
            //'version',
            //'allow_coupon_num',
            //'everyone_max_num',
            'created_at',
            //'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
