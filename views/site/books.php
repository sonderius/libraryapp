<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Books $model */
/** @var ActiveForm $form */
?>
<div class="books">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'author') ?>
        <?= $form->field($model, 'publishing') ?>
        <?= $form->field($model, 'year of publication') ?>
        <?= $form->field($model, 'ISBN') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- books -->
