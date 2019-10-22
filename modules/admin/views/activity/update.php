<?php

use app\models\Activity;
use app\modules\admin\service\CardService;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = '更新活动: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '活动', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="activity-update">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'card_name')->label('会员卡')->dropDownList(((new CardService())->getCardNameList()), ['prompt'=>'请选择']); ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'everyone_comment')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'is_hot')->label('热门')->dropDownList(Activity::hotDropdownList(), ['prompt'=>'请选择']) ?>

    <?php echo $form->field($model, 'is_selected')->label('精选')->dropDownList(Activity::selectDropdownList(), ['prompt'=>'请选择']) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
