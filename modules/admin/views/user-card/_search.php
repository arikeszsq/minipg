<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserCardSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-card-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'card_id') ?>

    <?= $form->field($model, 'card_name') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'valid_time_start') ?>

    <?php // echo $form->field($model, 'valid_time_end') ?>

    <?php // echo $form->field($model, 'valid_time') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <?php // echo $form->field($model, 'parent_name') ?>

    <?php // echo $form->field($model, 'card_num') ?>

    <?php // echo $form->field($model, 'parent_moblie') ?>

    <?php // echo $form->field($model, 'child_name') ?>

    <?php // echo $form->field($model, 'child_gender') ?>

    <?php // echo $form->field($model, 'child_birthday') ?>

    <?php // echo $form->field($model, 'child_age') ?>

    <?php // echo $form->field($model, 'cipher') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
