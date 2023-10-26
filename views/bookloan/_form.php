<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Bookloan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bookloan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'book')->textInput() ?>

    <?= $form->field($model, 'number_of_extensions')->textInput() ?>

    <?= $form->field($model, 'return_date')->textInput() ?>

    <?= $form->field($model, 'register_number')->textInput() ?>

    <?= $form->field($model, 'creation_date')->textInput() ?>

    <?= $form->field($model, 'borrower')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
