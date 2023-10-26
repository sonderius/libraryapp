<?php
// This model is used for borrowing and reservation of books, suitable for librarians.
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
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        // Action for displaying a list of books and their specific editions.

        $books = Books::find()->all();
        $editions = Book::find()->all();
        $users = Member::find()->all();
        return $this->render('index', ['books' => $books, 'editions' => $editions, 'users' => $users]);
    }

    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        // Action for adding a new literary work (Book) and its specific edition (BookEdition).
        $book = new Books();
        $edition = new Book();

        if ($book->load(Yii::$app->request->post()) && $edition->load(Yii::$app->request->post())) {
            if ($book->save() && $edition->save()) {
                Yii::$app->session->setFlash('success', 'The book has been successfully added.');
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', ['book' => $book, 'edition' => $edition]);
    }

    public function actionUpdate($bookId)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        // Action for editing a literary work (Book) and its specific edition (BookEdition).
        $book = Books::findOne($bookId);
        $edition = Book::findOne(['ISBN' => $bookId]);

        if ($book === null || $edition === null) {
            throw new NotFoundHttpException('The book was not found.');
        }

        if ($book->load(Yii::$app->request->post()) && $edition->load(Yii::$app->request->post())) {
            if ($book->save() && $edition->save()) {
                Yii::$app->session->setFlash('success', 'The book has been successfully updated.');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', ['book' => $book, 'edition' => $edition]);
    }

    public function actionDelete($bookId)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        // Action for deleting a literary work (Book) and all of its specific editions (BookEdition).
        $book = Books::findOne($bookId);

        if ($book === null) {
            throw new NotFoundHttpException('The book was not found.');
        }

        // Find all editions of this book and delete them.
        $editions = Book::find()->where(['book_id' => $bookId])->all();
        foreach ($editions as $edition) {
            $edition->delete();
        }

        $book->delete();
        Yii::$app->session->setFlash('success', 'The book and all of its editions have been successfully deleted.');
        return $this->redirect(['index']);
    }

    public function actionBorrow($editionId, $userId)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        // Action for displaying a form for borrowing a book.
        $book = Book::findOne($editionId);

        if ($book === null) {
            throw new NotFoundHttpException('The book was not found.');
        }

        // If the form was submitted
        if (Yii::$app->request->isPost) {
            // Process the form data and update the "availability" attribute to "borrowed"
            $book->load(Yii::$app->request->post());
            $book->availability = 'borrowed';

            if ($book->save()) {
                Yii::$app->session->setFlash('success', 'The book has been successfully borrowed.');
                return $this->redirect(['index']);
            }
        }

        // Display the form for borrowing the book
        return $this->render('borrow', ['book' => $book]);
    }

    public function actionReturn($editionId, $userId)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        // Load an existing model from the database based on the identifier
        $book = Book::findOne($editionId);

        if ($book !== null) {
            // Update the "availability" attribute to "available"
            $book->availability = 'available';

            // Save the changes to the database
            if ($book->save()) {
                echo 'The "availability" attribute has been updated to "available."';
            } else {
                echo 'Error when saving changes to the database.';
            }
        } else {
            echo 'The record in the "book" table with an identifier of ' . $editionId . ' was not found.';
        }
        // Here, you can perform additional logic for returning the book, such as updating lending records.
        Yii::$app->session->setFlash('success', 'The book has been successfully returned.');
        return $this->redirect(['index']);
    }
    // Additional actions for book reservation could be added here.
}