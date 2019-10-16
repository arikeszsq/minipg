<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ConsumLog */

$this->title = 'Update Consum Log: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Consum Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="consum-log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
