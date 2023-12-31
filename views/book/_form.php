<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Book $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'state')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'availability')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'limitation')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ISBN')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
