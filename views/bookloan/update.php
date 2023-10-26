<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bookloan $model */

$this->title = 'Update Bookloan: ' . $model->register_number;
$this->params['breadcrumbs'][] = ['label' => 'Bookloans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->register_number, 'url' => ['view', 'register_number' => $model->register_number]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bookloan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
