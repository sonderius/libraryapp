<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Membersearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="member-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'user_number') ?>

    <?= $form->field($model, 'adress') ?>

    <?= $form->field($model, 'mobile') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'active_reservation') ?>

    <?php // echo $form->field($model, 'active_loan') ?>

    <?php // echo $form->field($model, 'validity_of_registration') ?>

    <?php // echo $form->field($model, 'registration_status') ?>

    <?php // echo $form->field($model, 'registrated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
