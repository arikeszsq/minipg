<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserActivityComment */

$this->title = 'Create User Activity Comment';
$this->params['breadcrumbs'][] = ['label' => 'User Activity Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-activity-comment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
