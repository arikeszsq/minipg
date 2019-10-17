<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '活动详情', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="activity-view">
    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'price',
            'start_time',
            'end_time',
            'address',
            'detail',
            'price_detail',
            'everyone_comment',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>
    <div style="margin-left: 5px;">

    <?php
    if(!empty($model->logo_url)){
        echo ' <div style="margin-top: 5px;"> logo : <img src="'.$model->logo_url.'" width=80px;height=80px;></div>';
    }

    if(!empty($model->background_url)){
        echo ' <div style="margin-top: 5px;"> 背景图 : <img src="'.$model->background_url.'" width=80px;height=80px;></div>';
    }

    if(!empty($model->status)){
        echo '<div style="margin-top: 5px;"> <span style="color: red">活动状态：'.\app\models\Activity::getStatusTxt($model->status).'</div>';
    }

    ?>
    </div>


</div>
