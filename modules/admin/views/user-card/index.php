<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserCardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '会员管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-card-index">
    <p>
        <?= Html::a('新建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'card_num',
            'parent_name',
            'parent_moblie',
            'child_name',
            'child_gender',
            'child_birthday',
            'card_name',
            'created_at',
            'cipher',
//            'id',
//            'user_id',
//            'card_id',
//            'status',
            //'valid_time_start',
            //'valid_time_end',
            //'valid_time',
            //'updated_at',
            //'deleted_at',
            //'child_age',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
