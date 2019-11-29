<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Card */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->input('text',['style'=>'width:250px']) ?>

    <?php echo $form->field($model, 'status')->dropDownList(\app\models\Card::statusDropdownList(), ['prompt' => '请选择','style'=>'width:250px']); ?>

    <?= $form->field($model, 'valid_time_start')->widget(kartik\datetime\DateTimePicker::className(), [
        'readonly' => false,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss'
        ],
    ]) ?>

    <?= $form->field($model, 'valid_time_end')->widget(kartik\datetime\DateTimePicker::className(), [
        'readonly' => false,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss'
        ],
    ]) ?>

    <?php echo $form->field($model, 'pic_url')->widget('manks\FileInput', []); ?>

    <?= $form->field($model, 'price')->input('text',['style'=>'width:250px']) ?>
    <?= $form->field($model, 'allow_coupon_num')->input('text',['style'=>'width:250px']) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
