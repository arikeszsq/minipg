<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Business */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="business-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->widget('manks\FileInput', []);?>

    <?= $form->field($model, 'banner')->widget('manks\FileInput', []);?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wx_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valid_age_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valid_age_start')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textArea(['rows' => 2]) ?>

    <?= $form->field($model, 'coupon_detail')->textArea(['rows' => 2]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
