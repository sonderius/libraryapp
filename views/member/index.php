<?php

use app\models\Member;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Membersearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Members';
$this->params['breadcrumbs'][] = ['label' => 'Administration', 'url' => ['/administration']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="member-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Member', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'user_number',
            'adress:ntext',
            'mobile',
            'email:ntext',
            //'active_reservation',
            //'active_loan',
            //'validity_of_registration',
            //'registration_status:ntext',
            //'registrated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Member $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'user_number' => $model->user_number]);
                 }
            ],
        ],
    ]); ?>


</div>
