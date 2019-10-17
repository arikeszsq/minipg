<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '活动列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <p>
        <?= Html::a('新建活动', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
//                'header' => "logo",
                'format' => 'raw',
                'value' => function ($model) {
                    return '<img src="' . $model->logo_url . '" width=30px;height=30px;>';
                },
            ],
            [
                'label' => '活动名称',
                'attribute' => 'name',
            ],

//            [
//                'label' => '状态',
//                'attribute' => 'status',
//            ],
            [
                'label' => '价格',
                'attribute' => 'price',
            ],

//            [
////                'header' => "背景图",
//                'format' => 'raw',
//                'value' => function ($model) {
//                    return '<img src="'.$model->background_url.'" width=50px;height=50px;>';
//                },
//            ],
//            'start_time',
//            'end_time',
            [
                'label' => '地址',
                'attribute' => 'address',
            ],
//            'detail',
//            'price_detail',
//            'everyone_comment',
            [
                'label' => '创建时间',
                'attribute' => 'created_at',
            ],
//            'updated_at',
//            'deleted_at',
            [
//                'header' => "logo",
                'format' => 'raw',
                'value' => function ($model) {
                    if (!empty($model->status)) {
                        return \app\models\Activity::getStatusTxt($model->status);
                    } else {
                        return '';
                    }
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
