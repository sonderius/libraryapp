
<?php
use yii\helpers\Html;

$this->title = 'Smazat knihu a všechny její výtisky';
$this->params['breadcrumbs'][] = ['label' => 'Seznam knih a výtisků', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>Opravdu chcete smazat knihu a všechny její výtisky? Tento krok nelze vzít zpět.</p>

<div class="form-group">
    <?= Html::a('Zrušit', ['index'], ['class' => 'btn btn-default']) ?>
    <?= Html::a('Smazat', ['delete', 'bookId' => $book->id], ['class' => 'btn btn-danger']) ?>
</div>