<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BusinessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Businesses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Business', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'code',
            'tag',
            'logo',
            //'banner',
            //'phone',
            //'wx_num',
            //'address',
            //'valid_age_end',
            //'valid_age_start',
            //'valid_age',
            //'detail',
            //'coupon_detail',
            //'status',
            //'created_at',
            //'updated_at',
            //'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
