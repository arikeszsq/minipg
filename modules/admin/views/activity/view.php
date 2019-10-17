<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '活动详情', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="activity-view">
    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'status',
            'price',
//            [
//                'format' => 'raw',
//                'value' => function ($model) {
//                    return '<img src="'.$model->logo_url.'" width=60px;height=60px;>';
//                },
//            ],
//            [
//                'format' => 'raw',
//                'value' => function ($model) {
//                    return '<img src="'.$model->background_url.'" width=60px;height=60px;>';
//                },
//            ],
            'start_time',
            'end_time',
            'address',
            'detail',
            'price_detail',
            'everyone_comment',
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>
    <div> logo : <img src=<?php echo  $model->logo_url ?> width=60px;height=60px;>
        <div> 背景图 : <img src=<?php echo  $model->logo_url ?> width=60px;height=60px;>

</div>
