<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Reservation $model */

$this->title = $model->evidencial_number;
$this->params['breadcrumbs'][] = ['label' => 'Reservations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reservation-view">

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
            'date',
            'book',
            'evidencial_number',
            'date_expiration',
            'reservator',
            'staff',
        ],
    ]) ?>

</div>
