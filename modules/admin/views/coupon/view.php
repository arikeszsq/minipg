<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Coupon */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Coupons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="coupon-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'card_id',
            'card_name',
            'pic_url:url',
            'name',
            'description',
            'tag',
            'suitable_age_end',
            'suitable_age_start',
            'suitable_age',
            'price',
            'total_num',
            'status',
            'valid_time',
            'valid_time_start',
            'valid_time_end',
            'using_flow',
            'using_detail',
            'check_code',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
