<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Bookloansearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bookloan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'book') ?>

    <?= $form->field($model, 'number_of_extensions') ?>

    <?= $form->field($model, 'return_date') ?>

    <?= $form->field($model, 'register_number') ?>

    <?= $form->field($model, 'creation_date') ?>

    <?php // echo $form->field($model, 'borrower') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
