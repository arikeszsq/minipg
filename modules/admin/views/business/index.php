<?php

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
            'name',
            'code',
//            'logo',
//            //'banner',
            'phone',
            'wx_num',
            'address',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
