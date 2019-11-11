<?php

use app\models\Business;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Business */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="business-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->input('text',['style'=>'width:250px']) ?>

    <?= $form->field($model, 'logo')->widget('manks\FileInput', []);?>

    <?= $form->field($model, 'phone')->input('text',['style'=>'width:250px']) ?>

    <?= $form->field($model, 'wx_num')->input('text',['style'=>'width:250px']) ?>

    <?= $form->field($model, 'address')->input('text',['style'=>'width:250px']) ?>

    <?= $form->field($model, 'detail')->textArea(['rows' => 3,'style'=>'width:450px']) ?>

    <?php echo $form->field($model, 'status')->dropDownList(Business::statusDropdownList(), ['prompt'=>'请选择','style'=>'width:250px']) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
