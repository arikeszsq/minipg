<?php

use app\models\Card;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Card */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '会员卡', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card-view">
    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除项目嘛?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
//            'origin_price',
//            'count',
            'price',
            'created_at',
            'updated_at',
//            'deleted_at',
        ],
    ]) ?>

    <div style="margin-left: 5px;">

        <?php
        if(!empty($model->pic_url)){
            echo ' <div style="margin-top: 5px;"> logo : <img src="'.$model->pic_url.'" width=180px;height=180px;></div>';
        }

        if(!empty($model->status)){
            echo '<div style="margin-top: 5px;"> <span style="color: red">状态：'.Card::getStatusTxt($model->status).'</div>';
        }

        ?>
    </div>

</div>
