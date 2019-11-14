<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '轮播图';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-index">

    <p>
        <?= Html::a('新建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                "format" => 'raw',
                'value' => function ($model) {
                    return Html::img($model->url, ["width" => "120", "height" => "70"]);
                },
            ],
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
