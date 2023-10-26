<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\debt $model */

$this->title = $model->evidencial_number;
$this->params['breadcrumbs'][] = ['label' => 'Debts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="debt-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'evidencial_number' => $model->evidencial_number], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'evidencial_number' => $model->evidencial_number], [
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
            'evidencial_number',
            'bookloan',
            'amount',
            'state:ntext',
            'borrower',
        ],
    ]) ?>

</div>
