<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserActivityCollect */

$this->title = 'Update User Activity Collect: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Activity Collects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-activity-collect-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
