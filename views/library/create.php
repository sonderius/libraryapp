<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1>Přidat nové literární dílo a výtisk</h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($book, 'title')->textInput() ?>
<?= $form->field($book, 'isbn')->textInput() ?>
<?= $form->field($edition, 'name')->textInput() ?>

<div class="form-group">
    <?= Html::submitButton('Uložit', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>