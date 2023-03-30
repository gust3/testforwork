<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Subscriptions $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="subscriptions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_event')->dropDownList($events);?>

    <?= $form->field($model, 'recipient')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'blocked')->dropDownList(\app\helpers\subscriptionshelper::getBlockedArray()); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
