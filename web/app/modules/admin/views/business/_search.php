<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BusinessSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="business-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'tag') ?>

    <?= $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'banner') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'wx_num') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'valid_age_end') ?>

    <?php // echo $form->field($model, 'valid_age_start') ?>

    <?php // echo $form->field($model, 'valid_age') ?>

    <?php // echo $form->field($model, 'detail') ?>

    <?php // echo $form->field($model, 'coupon_detail') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
