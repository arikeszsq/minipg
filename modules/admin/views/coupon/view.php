<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Coupon */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '优惠券', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="coupon-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'card_name',
            [
                'label' => '卡图',
                'value' => $model->pic_url,
                'format' => [
                    'image',
                    [
                        'width' => '84',
                        'height' => '84'
                    ]

                ],
            ],
            'business_name',
            'name',
            'description',
            'tag',
            'suitable_age_start',
            'suitable_age_end',
            'price',
            'total_num',
            'valid_time_start',
            'valid_time_end',
            'using_flow',
            'using_detail',
            'check_code',
            'total_num',
            'stay_num',
            'already_sale_num',
            'everyone_max_num',
            'created_at',
            'updated_at'
        ],
    ]) ?>

</div>
