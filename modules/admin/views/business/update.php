<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Business */

$this->title = '更新: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '更新', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="business-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
