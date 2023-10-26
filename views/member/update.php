<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Member $model */

$this->title = 'Update Member: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Administration', 'url' => ['/administration']];
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'user_number' => $model->user_number]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="member-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
