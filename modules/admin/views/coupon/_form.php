<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Coupon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coupon-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'business_id')->textInput() ?>

    <?= $form->field($model, 'business_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pic_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'suitable_age_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'suitable_age_start')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'suitable_age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_num')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valid_time')->textInput() ?>

    <?= $form->field($model, 'valid_time_start')->textInput() ?>

    <?= $form->field($model, 'valid_time_end')->textInput() ?>

    <?= $form->field($model, 'using_flow')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'using_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'check_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'deleted_at')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
