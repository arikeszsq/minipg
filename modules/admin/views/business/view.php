<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Business */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '商家', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="business-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'label' => '状态',
                'value' => $model::getStatusTxt($model->status)
            ],

            [
                'label' => 'logo',
                'value' => $model->logo,
                'format' => [
                    'image',
                    [
                        'width' => '84',
                        'height' => '84'
                    ]

                ],
            ],
            'phone',
            'wx_num',
            'address',
            'detail',
            'code',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
