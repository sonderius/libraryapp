<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\debt $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="debt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'evidencial_number')->textInput() ?>

    <?= $form->field($model, 'bookloan')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'state')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'borrower')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
