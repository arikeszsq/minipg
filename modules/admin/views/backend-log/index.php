<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BackendLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '日志列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backend-log-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_name',
            'content',
            'created_at',
        ],
    ]); ?>


</div>
