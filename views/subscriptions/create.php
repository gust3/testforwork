<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Subscriptions $model */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Subscriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscriptions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'events' => $events
    ]) ?>

</div>
