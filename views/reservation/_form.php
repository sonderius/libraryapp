<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Reservation $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reservation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'book')->textInput() ?>

    <?= $form->field($model, 'evidencial_number')->textInput() ?>

    <?= $form->field($model, 'date_expiration')->textInput() ?>

    <?= $form->field($model, 'reservator')->textInput() ?>

    <?= $form->field($model, 'staff')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
