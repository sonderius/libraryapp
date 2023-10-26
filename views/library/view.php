<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $book->title;
$this->params['breadcrumbs'][] = ['label' => 'List of books and editions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Edit', ['update', 'bookId' => $book->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Delete', ['delete', 'bookId' => $book->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Do you really want to delete this book and all of its editions?',
            'method' => 'post',
        ],
    ]) ?>
</p>

<?= DetailView::widget([
    'model' => $book,
    'attributes' => [
        'title',
        'isbn',
        // Other attributes of the literary work
    ],
]) ?>

<?php if ($edition): ?>
    <h2>Edition Information</h2>
    <?= DetailView::widget([
        'model' => $edition,
        'attributes' => [
            'name',
            'borrower_name',
            'borrow_date',
            // Other attributes of the edition
        ],
    ]) ?>
<?php endif; ?>
