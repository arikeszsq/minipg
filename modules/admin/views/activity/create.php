<?php

use app\models\Activity;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = '新建活动';
$this->params['breadcrumbs'][] = ['label' => '活动', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-create">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label('活动名称')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->label('价格')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->dropDownList(Activity::statusDropdownList(), ['prompt'=>'请选择']) ?>

    <?php echo $form->field($model, 'logo_url')->label('封面图-Logo')->widget('manks\FileInput', []); ?>

    <?php echo $form->field($model, 'background_url')->label('背景图')->widget('manks\FileInput', []); ?>

    <?= $form->field($model, 'start_time')->label('开始时间')->widget(kartik\datetime\DateTimePicker::className(), [
        'readonly' => false,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss'
        ],
    ]) ?>

    <?= $form->field($model, 'end_time')->label('结束时间')->widget(kartik\datetime\DateTimePicker::className(), [
        'readonly' => false,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss'
        ],
    ]) ?>

    <?= $form->field($model, 'address')->label('地点')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->label('活动详情')->textArea(['rows' => 3]) ?>

    <?= $form->field($model, 'price_detail')->label('费用说明')->textArea(['rows' => 2]) ?>

    <?= $form->field($model, 'everyone_comment')->label('大家说')->textArea(['rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
