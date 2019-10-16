<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BusinessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '商家管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
            [
                'label' => '商家名',
                'attribute' => 'name',
            ],
            [
                'label' => '商家手机号',
                'attribute' => 'phone',
            ],
            [
                'label' => '商家微信号',
                'attribute' => 'wx_num',
            ],
            [
                'label' => '商家地址',
                'attribute' => 'address',
            ],

            [
                'label' => '商家详情',
                'attribute' => 'detail',
            ],

//            [
//                'label' => '状态',
//                'attribute' => 'status',
//            ],
            [
                'label' => '添加时间',
                'attribute' => 'created_at',
            ],


            //'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
