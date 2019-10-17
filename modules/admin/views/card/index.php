<?php

use app\models\Card;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '会员卡管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-index">
    <p>
        <?= Html::a('新建会员卡', ['create'], ['class' => 'btn btn-success']) ?>
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
            'name',
//            'status',
//            'origin_price',
            //'count',
            'price',
            'created_at',
            //'updated_at',
            //'deleted_at',
            [
                'format' => 'raw',
                'value' => function ($model) {
                    if (!empty($model->status)) {
                        return Card::getStatusTxt($model->status);
                    } else {
                        return '';
                    }
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
