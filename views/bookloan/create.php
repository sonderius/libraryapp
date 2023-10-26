<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bookloan $model */

$this->title = 'Create Bookloan';
$this->params['breadcrumbs'][] = ['label' => 'Bookloans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bookloan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
