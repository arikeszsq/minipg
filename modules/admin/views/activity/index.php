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
            'id',
            [
                'label' => '活动名称',
                'attribute' => 'name',
            ],
            [
                'label' => '状态',
                'attribute' => 'status',
            ],
            [
                'label' => '价格',
                'attribute' => 'price',
            ],

//            'logo_url:url',
//            'background_url:url',
            //'start_time',
            //'end_time',
            //'address',
            //'detail',
            //'price_detail',
            //'everyone_comment',
//            'created_at',
            //'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
