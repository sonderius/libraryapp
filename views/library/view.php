<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $book->title;
$this->params['breadcrumbs'][] = ['label' => 'Seznam knih a výtisků', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Upravit', ['update', 'bookId' => $book->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Smazat', ['delete', 'bookId' => $book->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Opravdu chcete smazat tuto knihu a všechny její výtisky?',
            'method' => 'post',
        ],
    ]) ?>
</p>

<?= DetailView::widget([
    'model' => $book,
    'attributes' => [
        'title',
        'isbn',
        // Další atributy literárního díla
    ],
]) ?>

<?php if ($edition): ?>
    <h2>Informace o výtisku</h2>
    <?= DetailView::widget([
        'model' => $edition,
        'attributes' => [
            'name',
            'borrower_name',
            'borrow_date',
            // Další atributy výtisku
        ],
    ]) ?>
<?php endif; ?>