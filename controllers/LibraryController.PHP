<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Book; 
use app\models\Books; 
use app\models\Member; 
use yii\web\NotFoundHttpException;
class LibraryController extends Controller
{
    public function actionIndex()
    {
        // Akce pro zobrazení seznamu knih a jejich konkrétních výtisků.
        $books = Books::find()->all();
        $editions = Book::find()->all();
        $users = Member::find()->all();
        return $this->render('index', ['books' => $books, 'editions' => $editions,'users' => $users]);
    }

    public function actionCreate()
    {
        // Akce pro přidání nového literárního díla (Book) a jeho konkrétního výtisku (BookEdition).
        
        $book = new Books();
        $edition = new Book();

        if ($book->load(Yii::$app->request->post()) && $edition->load(Yii::$app->request->post())) {
            if ($book->save() && $edition->save()) {
                Yii::$app->session->setFlash('success', 'Kniha byla úspěšně přidána.');
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', ['book' => $book, 'edition' => $edition]);
    }

    public function actionUpdate($bookId)
    {
        // Akce pro úpravu literárního díla (Book) a jeho konkrétního výtisku (BookEdition).
        $book = Books::findOne($bookId);
        $edition = Book::findOne(['ISBN' => $bookId]);

        if ($book === null || $edition === null) {
            throw new NotFoundHttpException('Kniha nebyla nalezena.');
        }

        if ($book->load(Yii::$app->request->post()) && $edition->load(Yii::$app->request->post())) {
            if ($book->save() && $edition->save()) {
                Yii::$app->session->setFlash('success', 'Kniha byla úspěšně aktualizována.');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', ['book' => $book, 'edition' => $edition]);
    }

    public function actionDelete($bookId)
    {
        // Akce pro smazání literárního díla (Book) a všech jeho konkrétních výtisků (BookEdition).
        $book = Books::findOne($bookId);

        if ($book === null) {
            throw new NotFoundHttpException('Kniha nebyla nalezena.');
        }

        // Najdeme všechny výtisky této knihy a smažeme je.
        $editions = Book::find()->where(['book_id' => $bookId])->all();
        foreach ($editions as $edition) {
            $edition->delete();
        }

        $book->delete();
        Yii::$app->session->setFlash('success', 'Kniha a všechny její výtisky byly úspěšně smazány.');
        return $this->redirect(['index']);
    }

    public function actionBorrow($editionId, $userId)
{
    // Akce pro zobrazení formuláře na požičanie knihy.
    $book = Book::findOne($editionId);
    
    if ($book === null) {
        throw new NotFoundHttpException('Kniha nebyla nalezena.');
    }

    // Ak bol odoslaný formulár
    if (Yii::$app->request->isPost) {
        // Spracovanie údajov z formulára a aktualizácia atribútu availability na "požičaná"
        $book->load(Yii::$app->request->post());
        $book->availability = 'požičaná';

        if ($book->save()) {
            Yii::$app->session->setFlash('success', 'Kniha bola úspešne požičaná.');
            return $this->redirect(['index']);
        }
    }

    // Zobrazíme formulár na požičanie knihy
    return $this->render('borrow', ['book' => $book]);
}

    public function actionReturn($editionId, $userId)
    {
        // Načítanie existujúceho modelu z databázy na základe identifikátora
        $book = Book::findOne($editionId);

        if ($book !== null) {
            // Aktualizácia atribútu availability na "k dispozícii"
            $book->availability = 'k dispozícii';

            // Uloženie zmien do databázy
            if ($book->save()) {
                echo 'Atribút availability bol aktualizovaný na "k dispozícii".';
            } else {
                echo 'Chyba pri ukladaní zmien do databázy.';
            }
        } else {
            echo 'Záznam v tabuľke book s identifikátorom ' . $editionId . ' nebol nájdený.';
        }
        
        
    

        // Tu môžete vykonať ďalšiu logiku pre vrátenie knihy, napríklad aktualizáciu záznamov o pôžičkách.
        Yii::$app->session->setFlash('success', 'Kniha bola úspešne vrátená.');
        return $this->redirect(['index']);
    }

  
}