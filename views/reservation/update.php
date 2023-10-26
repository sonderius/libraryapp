<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Reservation $model */

$this->title = 'Update Reservation: ' . $model->evidencial_number;
$this->params['breadcrumbs'][] = ['label' => 'Reservations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->evidencial_number, 'url' => ['view', 'evidencial_number' => $model->evidencial_number]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reservation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
