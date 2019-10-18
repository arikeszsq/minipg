<?php

use app\models\Card;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Card */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label('名称')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->label('状态')->dropDownList(Card::statusDropdownList(), ['prompt'=>'请选择']) ?>

    <?php echo $form->field($model, 'pic_url')->label('logo')->widget('manks\FileInput', []); ?>

    <?= $form->field($model, 'price')->label('价格')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valid_time')->label('有效时长')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
