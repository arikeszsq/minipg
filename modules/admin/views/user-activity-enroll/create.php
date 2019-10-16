<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserActivityEnroll */

$this->title = 'Create User Activity Enroll';
$this->params['breadcrumbs'][] = ['label' => 'User Activity Enrolls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-activity-enroll-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
