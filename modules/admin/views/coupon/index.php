<?php

use app\models\Coupon;
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
                "format" => 'raw',
                'value' => function ($model) {
                    return Html::img($model->pic_url, ["width" => "30", "height" => "30"]);
                },
            ],
            'card_name',
            'name',
            'price',
            'total_num',
            'check_code',
            'created_at',
            [
                'format' => 'raw',
                'value' => function ($model) {
                    if (intval($model->status) == Coupon::Status_有效) {
                        return '<span style="color: red;">有效</span>';
                    } else {
                        return '<span style="color: yellowgreen;">失效</span>';
                    }
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
