<?php

use app\models\Card;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '会员卡列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-index">
    <p>
        <?= Html::a('新建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


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

            'name',
            'price',
            'created_at',

            [
                'format' => 'raw',
                'value' => function ($model) {
                    if (intval($model->status) == Card::Status_使用中) {
                        return '<span style="color: red;">使用中</span>';
                    } elseif (intval($model->status) == Card::Status_已绝版) {
                        return '<span style="color: blueviolet;">已绝版</span>';
                    } else {
                        return '<span style="color: yellowgreen;">预发售</span>';
                    }
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
