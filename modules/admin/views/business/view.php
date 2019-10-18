<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Business */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '商家', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="business-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除商家？',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'code',
            'tag',
            'logo',
            'banner',
            'phone',
            'wx_num',
            'address',
            'valid_age_end',
            'valid_age_start',
            'valid_age',
            'detail',
            'coupon_detail',
            'status',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
