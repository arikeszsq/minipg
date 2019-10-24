<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventEnroll */

$this->title = 'Create Event Enroll';
$this->params['breadcrumbs'][] = ['label' => 'Event Enrolls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-enroll-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
