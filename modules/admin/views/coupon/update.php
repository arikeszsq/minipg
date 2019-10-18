<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coupon */

$this->title = '更新优惠券: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '优惠券', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="coupon-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
