<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Business */

$this->title = '新建商家';
$this->params['breadcrumbs'][] = ['label' => '商家', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
