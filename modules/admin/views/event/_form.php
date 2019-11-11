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

    <?= $form->field($model, 'name')->input('text',['style'=>'width:250px']) ?>

    <?= $form->field($model, 'card_name')->dropDownList(((new CardService())->getCardNameList()), ['prompt' => '请选择','style'=>'width:250px']); ?>

    <?= $form->field($model, 'status')->dropDownList(Event::statusDropdownList(), ['prompt' => '请选择','style'=>'width:250px']) ?>

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

    <?= $form->field($model, 'address_name')->input('text',['style'=>'width:250px']) ?>

    <?= $form->field($model, 'address')->input('text',['style'=>'width:250px']) ?>

    <?php echo $form->field($model, 'detail')->widget('kucha\ueditor\UEditor', [
        'clientOptions' => [
            //编辑区域大小
            'initialFrameHeight' => '200',
        ]
    ]); ?>

    <?= $form->field($model, 'price')->input('text',['style'=>'width:250px']) ?>

    <?= $form->field($model, 'price_detail')->textArea(['rows' => 3,'style'=>'width:450px']) ?>

    <?= $form->field($model, 'is_hot')->dropDownList(Event::hotDropdownList(), ['prompt' => '请选择','style'=>'width:250px']) ?>

    <?= $form->field($model, 'is_recommand')->dropDownList(Event::selectDropdownList(), ['prompt' => '请选择','style'=>'width:250px']) ?>

    <?= $form->field($model, 'need_vip')->dropDownList(Event::vipDropdownList(), ['prompt' => '请选择','style'=>'width:250px']) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
