<?php

use app\models\debt;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Debtssearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Debts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="debt-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Debt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'evidencial_number',
            'bookloan',
            'amount',
            'state:ntext',
            'borrower',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, debt $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'evidencial_number' => $model->evidencial_number]);
                 }
            ],
        ],
    ]); ?>


</div>
