<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Bookloan $model */

$this->title = $model->register_number;
$this->params['breadcrumbs'][] = ['label' => 'Bookloans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bookloan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'register_number' => $model->register_number], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'register_number' => $model->register_number], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'book',
            'number_of_extensions',
            'return_date',
            'register_number',
            'creation_date',
            'borrower',
        ],
    ]) ?>

</div>
