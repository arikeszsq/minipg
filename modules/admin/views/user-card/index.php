<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserCardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Cards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-card-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Card', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'card_id',
            'card_name',
            'status',
            //'valid_time_start',
            //'valid_time_end',
            //'valid_time',
            //'created_at',
            //'updated_at',
            //'deleted_at',
            //'parent_name',
            //'card_num',
            //'parent_moblie',
            //'child_name',
            //'child_gender',
            //'child_birthday',
            //'child_age',
            //'cipher',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
