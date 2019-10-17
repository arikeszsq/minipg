<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CouponSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '优惠卷';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coupon-index">


    <p>
        <?= Html::a('新建优惠卷', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'format' => 'raw',
                'value' => function ($model) {
                    return '<img src="'.$model->pic_url.'" width=50px;height=50px;>';
                },
            ],
            'card_name',
            'name',
            'description',
//            'tag',
//            'suitable_age_end',
//            'suitable_age_start',
//            'suitable_age',
            'price',
            'total_num',
//            'status',
//            'valid_time',
//            'valid_time_start',
//            'valid_time_end',
//            'using_flow',
//            'using_detail',
//            'check_code',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
