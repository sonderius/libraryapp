<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Debtssearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="debt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'evidencial_number') ?>

    <?= $form->field($model, 'bookloan') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'state') ?>

    <?= $form->field($model, 'borrower') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
