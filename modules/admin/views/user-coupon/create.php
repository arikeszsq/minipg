<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserCoupon */

$this->title = 'Create User Coupon';
$this->params['breadcrumbs'][] = ['label' => 'User Coupons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-coupon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
