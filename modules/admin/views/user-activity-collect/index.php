<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserActivityCollectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Activity Collects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-activity-collect-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Activity Collect', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'activity_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
