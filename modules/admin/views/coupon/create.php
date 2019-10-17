<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coupon */

$this->title = '优惠卷';
$this->params['breadcrumbs'][] = ['label' => '优惠卷', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coupon-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
