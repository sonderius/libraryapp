<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Member $model */

$this->title = 'Create Member';
$this->params['breadcrumbs'][] = ['label' => 'Administration', 'url' => ['/administration']];
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>