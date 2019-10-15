<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = '新建产品';
$this->params['breadcrumbs'][] = ['label' => '产品', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?php echo $form->field($model, 'file')->label('图一')->widget('manks\FileInput', []); ?>

    <?= $form->field($model, 'name')->label('名称')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'photo')->label('图二')->widget('manks\FileInput', []); ?>


    <?= $form->field($model, 'description')->label('描述')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>