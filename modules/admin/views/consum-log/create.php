<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ConsumLog */

$this->title = 'Create Consum Log';
$this->params['breadcrumbs'][] = ['label' => 'Consum Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consum-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
