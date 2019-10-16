<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserCard */

$this->title = 'Update User Card: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-card-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
