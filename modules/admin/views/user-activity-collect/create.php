<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserActivityCollect */

$this->title = 'Create User Activity Collect';
$this->params['breadcrumbs'][] = ['label' => 'User Activity Collects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-activity-collect-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
