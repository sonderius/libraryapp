<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Member $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Administration', 'url' => ['/administration']];
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="member-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'user_number' => $model->user_number], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'user_number' => $model->user_number], [
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
            'name',
            'user_number',
            'adress:ntext',
            'mobile',
            'email:ntext',
            'active_reservation',
            'active_loan',
            'validity_of_registration',
            'registration_status:ntext',
            'registrated_by',
        ],
    ]) ?>

</div>
