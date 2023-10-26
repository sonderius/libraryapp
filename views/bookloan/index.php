<?php

use app\models\Bookloan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Bookloansearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bookloans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bookloan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bookloan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'book',
            'number_of_extensions',
            'return_date',
            'register_number',
            'creation_date',
            //'borrower',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Bookloan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'register_number' => $model->register_number]);
                 }
            ],
        ],
    ]); ?>


</div>
