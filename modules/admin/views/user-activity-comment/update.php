<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserActivityComment */

$this->title = 'Update User Activity Comment: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Activity Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-activity-comment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
