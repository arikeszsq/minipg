<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Card */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '会员卡', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
//            'description',
            [
                'label' => '状态',
                'value' => $model::getStatusTxt($model->status)
            ],
            'valid_time_start',
            'valid_time_end',
//            'valid_time',

            [
                'label' => '卡图',
                'value' => $model->pic_url,
                'format' => [
                    'image',
                    [
                        'width' => '100',
                        'height' => '60'
                    ]

                ],
            ],
            'price',
//            'origin_price',
//            'count',
//            'sale_max_num',
//            'already_sale_num',
//            'stay_num',
//            'version',
            'allow_coupon_num',
//            'everyone_max_num',
            'created_at',
            'updated_at',
//            'deleted_at',
        ],
    ]) ?>

</div>
