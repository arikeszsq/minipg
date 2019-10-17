<?php

use app\models\Coupon;
use app\modules\admin\service\CardService;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Coupon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coupon-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'card_name')->label('会员卡')->dropDownList(((new CardService())->getCardNameList()), ['prompt'=>'请选择']); ?>

    <?php echo $form->field($model, 'pic_url')->label('logo图')->widget('manks\FileInput', []); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textArea(['rows' => 2]) ?>

    <?= $form->field($model, 'tag')->label('标签 (实例：艺术，体育，音乐)')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'suitable_age_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'suitable_age_start')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_num')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(Coupon::statusDropdownList(), ['prompt'=>'请选择']); ?>

    <?= $form->field($model, 'valid_time_start')->label('有效开始时间')->widget(kartik\datetime\DateTimePicker::className(), [
        'readonly' => false,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss'
        ],
    ]) ?>

    <?= $form->field($model, 'valid_time_end')->label('有效结束时间')->widget(kartik\datetime\DateTimePicker::className(), [
        'readonly' => false,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss'
        ],
    ]) ?>

    <?= $form->field($model, 'using_flow')->textArea(['rows' => 2]) ?>

    <?= $form->field($model, 'using_detail')->textArea(['rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
