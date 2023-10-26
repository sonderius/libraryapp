<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Staff $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="staff-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'staff_number' => $model->staff_number], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'staff_number' => $model->staff_number], [
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
            'name:ntext',
            'position:ntext',
            'contact',
            'salary',
            'staff_number',
            'email:ntext',
            'id',
            'username:ntext',
            'password:ntext',
            'authKey:ntext',
            'accessToken:ntext',
        ],
    ]) ?>

</div>
