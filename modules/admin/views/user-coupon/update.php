<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserCoupon */

$this->title = 'Update User Coupon: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Coupons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-coupon-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
