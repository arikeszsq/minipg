<?php

use app\models\Coupon;
use app\modules\admin\service\CardService;
use app\modules\admin\service\CommonService;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Coupon */

$this->title = '更新优惠券: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '优惠券', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="coupon-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->input('text', ['style' => 'width:250px']) ?>

    <?php echo $form->field($model, 'pic_url')->label('logo图')->widget('manks\FileInput', []); ?>


    <?= $form->field($model, 'description')->textArea(['rows' => 3, 'style' => 'width:450px']) ?>

    <?= $form->field($model, 'tag')->label('标签 (实例：艺术，体育，音乐)')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'suitable_age_start')->input('text', ['style' => 'width:250px']) ?>

    <?= $form->field($model, 'suitable_age_end')->input('text', ['style' => 'width:250px']) ?>

    <?= $form->field($model, 'price')->input('text', ['style' => 'width:250px']) ?>

    <?= $form->field($model, 'status')->dropDownList(Coupon::statusDropdownList(), ['prompt' => '请选择', 'style' => 'width:250px']); ?>

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

    <?= $form->field($model, 'using_flow')->textArea(['rows' => 2, 'style' => 'width:450px']) ?>

    <?= $form->field($model, 'using_detail')->textArea(['rows' => 2, 'style' => 'width:450px']) ?>


    <?= $form->field($model, 'total_num')->input('text', ['style' => 'width:250px']) ?>
    <?= $form->field($model, 'everyone_max_num')->input('text', ['style' => 'width:250px']) ?>


    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
