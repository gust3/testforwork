<?php

use app\models\Subscriptions;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SubscriptionsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Подписки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscriptions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'type_event',
                'filter' => $events,
                'value' => function($data) use ($events){
                    return $events[$data->type_event];
                }
            ],
            'recipient',
            'email:email',
            [
                'attribute' => 'blocked',
                'filter' => \app\helpers\subscriptionshelper::getBlockedArray(),
                'value' => function($data){
                    $array = \app\helpers\subscriptionshelper::getBlockedArray();
                    return $array[$data->blocked];
                }
            ],
            //'created',
            //'updated',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Subscriptions $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
