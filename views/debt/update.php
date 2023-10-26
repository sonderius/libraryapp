<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\debt $model */

$this->title = 'Update Debt: ' . $model->evidencial_number;
$this->params['breadcrumbs'][] = ['label' => 'Debts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->evidencial_number, 'url' => ['view', 'evidencial_number' => $model->evidencial_number]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="debt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
