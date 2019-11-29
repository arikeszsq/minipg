<?php

use app\models\Business;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BusinessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '商家';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-index">
    <p>
        <?= Html::a('新建商家', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                "format" => 'raw',
                'value' => function ($model) {
                    return Html::img($model->logo, ["width" => "30", "height" => "30"]);
                },
            ],
            'name',
//            'code',
//            'logo',
//            //'banner',
//        'status',
            'phone',
            'wx_num',
            'address',
            'created_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}',
//                'buttons' => [
//                    'view' => function ($url, Business $model, $key) {
//                        return Html::a('详情', $url, [
//                            'class' => 'btn btn-primary btn-xs',
//                            'style' => 'margin-left:5px;',
//                        ]);
//                    },
//                    'delete' => function ($url, Business $model, $key) {
//                        return Html::a('删除', $url, [
//                            'class' => 'btn btn-danger btn-xs',
//                            'style' => 'margin-left:5px;',
//                            'data' => [
//                                'confirm' => '确认删除这条记录？',
//                                'method' => 'post',
//                            ],
//                        ]);
//                    },
//                ],
            ],
        ],
    ]); ?>


</div>
