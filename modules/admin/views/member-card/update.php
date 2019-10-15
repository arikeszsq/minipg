<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MemberCard */

$this->title = 'Update Member Card: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Member Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="member-card-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
