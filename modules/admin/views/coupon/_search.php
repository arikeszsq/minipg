<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CouponSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coupon-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'card_id') ?>

    <?= $form->field($model, 'card_name') ?>

    <?= $form->field($model, 'pic_url') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'tag') ?>

    <?php // echo $form->field($model, 'suitable_age_end') ?>

    <?php // echo $form->field($model, 'suitable_age_start') ?>

    <?php // echo $form->field($model, 'suitable_age') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'total_num') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'valid_time') ?>

    <?php // echo $form->field($model, 'valid_time_start') ?>

    <?php // echo $form->field($model, 'valid_time_end') ?>

    <?php // echo $form->field($model, 'using_flow') ?>

    <?php // echo $form->field($model, 'using_detail') ?>

    <?php // echo $form->field($model, 'check_code') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
