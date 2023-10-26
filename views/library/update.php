
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1>Upravit literární dílo a výtisk</h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($book, 'name')->textInput() ?>
<?= $form->field($book, 'author')->textInput() ?>

<?= $form->field($edition, 'ISBN')->textInput() ?>
<?= $form->field($edition, 'availability')->textInput() ?>
<?= $form->field($edition, 'id')->textInput() ?>
<div class="form-group">
    <?= Html::submitButton('Uložit', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>