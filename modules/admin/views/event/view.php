<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="event-view">

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
            'name',
            'card_name',
            [
                'label' => '热门',
                'value' => $model::getStatusTxt($model->status)
            ],
            'logo_url:url',
            'background_url:url',
            'start_time',
            'end_time',
            'address',
            'detail',
            'price',
            'price_detail',
            [
                'label' => '热门',
                'value' => $model::getStatusTxt($model->is_hot)
            ],
            [
                'label' => '推荐',
                'value' => $model::getSelectTxt($model->is_recommand)
            ],
            [
                'label' => '需要vip',
                'value' => $model::getVipTxt($model->need_vip)
            ],
        ],
    ]) ?>

</div>