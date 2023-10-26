<?php

namespace app\controllers;
use Yii;
use app\models\Bookloan;
use app\models\Bookloansearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookloanController implements the CRUD actions for Bookloan model.
 */
class BookloanController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Bookloan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $searchModel = new Bookloansearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bookloan model.
     * @param int $register_number Register Number
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($register_number)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        return $this->render('view', [
            'model' => $this->findModel($register_number),
        ]);
    }

    /**
     * Creates a new Bookloan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Bookloan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'register_number' => $model->register_number]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Bookloan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $register_number Register Number
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($register_number)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = $this->findModel($register_number);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'register_number' => $model->register_number]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bookloan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $register_number Register Number
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($register_number)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->findModel($register_number)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bookloan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $register_number Register Number
     * @return Bookloan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($register_number)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        if (($model = Bookloan::findOne(['register_number' => $register_number])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
