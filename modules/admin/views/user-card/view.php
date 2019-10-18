<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserCard */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '会员详情', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-card-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'card_id',
            'card_name',
            'status',
            'valid_time_start',
            'valid_time_end',
            'valid_time',
            'created_at',
            'updated_at',
            'deleted_at',
            'parent_name',
            'card_num',
            'parent_moblie',
            'child_name',
            'child_gender',
            'child_birthday',
            'child_age',
            'cipher',
        ],
    ]) ?>

</div>
