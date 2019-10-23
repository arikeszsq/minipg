<?php

use app\models\Event;
use app\modules\admin\service\CardService;
use manks\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'card_name')->dropDownList(((new CardService())->getCardNameList()), ['prompt'=>'请选择']); ?>

    <?= $form->field($model, 'status')->dropDownList(Event::statusDropdownList(), ['prompt'=>'请选择']) ?>

    <?php echo $form->field($model, 'logo_url')->widget('manks\FileInput', []); ?>


    <?php
    echo $form->field($model, 'background_url')->widget('manks\FileInput', [
        'clientOptions' => [
            'pick' => [
                'multiple' => true,
            ],
        ],
    ]); ?>


    <?= $form->field($model, 'start_time')->widget(kartik\datetime\DateTimePicker::className(), [
        'readonly' => false,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss'
        ],
    ]) ?>

    <?= $form->field($model, 'end_time')->widget(kartik\datetime\DateTimePicker::className(), [
        'readonly' => false,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss'
        ],
    ]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_detail')->textArea(['rows' => 3]) ?>

    <?= $form->field($model, 'is_hot')->dropDownList(Event::hotDropdownList(), ['prompt'=>'请选择']) ?>

    <?= $form->field($model, 'is_recommand')->dropDownList(Event::selectDropdownList(), ['prompt'=>'请选择']) ?>

    <?= $form->field($model, 'need_vip')->dropDownList(Event::vipDropdownList(), ['prompt'=>'请选择']) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
