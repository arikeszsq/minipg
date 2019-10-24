<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BackendLog */

$this->title = 'Create Backend Log';
$this->params['breadcrumbs'][] = ['label' => 'Backend Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backend-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
