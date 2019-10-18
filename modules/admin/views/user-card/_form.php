<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserCard */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'card_id')->textInput() ?>

    <?= $form->field($model, 'card_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'valid_time_start')->textInput() ?>

    <?= $form->field($model, 'valid_time_end')->textInput() ?>

    <?= $form->field($model, 'valid_time')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'card_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_moblie')->textInput() ?>

    <?= $form->field($model, 'child_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'child_gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'child_birthday')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'child_age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cipher')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
