<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Subscriptions $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Подписки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="subscriptions-view">

    <h1>Подписка #<?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'type_event',
                'value' => function($data) use ($events){
                    return $events[$data->type_event];
                }
            ],
            'recipient',
            'email:email',
            [
                'attribute' => 'blocked',
                'value' => function($data){
                    $array = \app\helpers\subscriptionshelper::getBlockedArray();
                    return $array[$data->blocked];
                }
            ],
            [
                'attribute' => 'created',
                'value' => function($data){
                    return date('d-m-Y h:i', $data->created);
                }
            ],
            [
                'attribute' => 'updated',
                'value' => function($data){
                    return date('d-m-Y h:i', $data->updated);
                }
            ],

        ],
    ]) ?>

</div>
