<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use yii\data\ActiveDataProvider;
use app\models\Books; // Předpokládejme, že máte model Book pro knihy.
use app\models\BooksSearch;
$dataProvider = new ActiveDataProvider([
    'query' => Books::find(), // Query, kterým získáváte data.
    'pagination' => [
        'pageSize' => 10, // Počet položek na stránku.
    ],
    // Další možné nastavení, například filtrování, řazení atd.
]);

$searchModel = new BooksSearch();
/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Knihy';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="book-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'author',
            'publishing',
            'year_of_publication',
            'ISBN',


            // Další sloupce, pokud jsou potřeba.

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                 'buttons'        
           
              
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>