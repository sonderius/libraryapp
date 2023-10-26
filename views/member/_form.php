<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Member $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="member-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'user_number')->textInput() ?>

    <?= $form->field($model, 'adress')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mobile')->textInput() ?>

    <?= $form->field($model, 'email')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'active_reservation')->textInput() ?>

    <?= $form->field($model, 'active_loan')->textInput() ?>

    <?= $form->field($model, 'validity_of_registration')->textInput() ?>

    <?= $form->field($model, 'registration_status')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'registrated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
