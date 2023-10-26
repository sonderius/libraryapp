<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Member;
$this->title = 'Evidovat půjčku knihy';
$this->params['breadcrumbs'][] = ['label' => 'Seznam knih a výtisků', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$users = Member::find()->all();
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>Evidovat půjčku výtisku knihy:</p>

<?php $form = ActiveForm::begin(); ?>
<label for="user-select">Vyberte uživatela:</label>


<select id="user-select" name="userId">
    <option value=""></option>
    <?php foreach ($users as $user): ?>
        <option value="<?= $user->user_number ?>"><?= $user->name ?></option>
    <?php endforeach; ?>
</select
<?= "var"/* $form->field($edition, 'borrower_name')->textInput() ?>
<?= $form->field($edition, 'borrow_date')->textInput(['type' => 'date']) */?>

<div class="form-group">
    <?= Html::a('Zrušit', ['index'], ['class' => 'btn btn-default']) ?>
    <?= Html::submitButton('Evidovat půjčku', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>