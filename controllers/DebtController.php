<?php

namespace app\controllers;

use app\models\debt;
use app\models\Debtssearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DebtController implements the CRUD actions for debt model.
 */
class DebtController extends Controller
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
     * Lists all debt models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new Debtssearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single debt model.
     * @param int $evidencial_number Evidencial Number
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($evidencial_number)
    {
        return $this->render('view', [
            'model' => $this->findModel($evidencial_number),
        ]);
    }

    /**
     * Creates a new debt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new debt();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'evidencial_number' => $model->evidencial_number]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing debt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $evidencial_number Evidencial Number
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($evidencial_number)
    {
        $model = $this->findModel($evidencial_number);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'evidencial_number' => $model->evidencial_number]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing debt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $evidencial_number Evidencial Number
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($evidencial_number)
    {
        $this->findModel($evidencial_number)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the debt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $evidencial_number Evidencial Number
     * @return debt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($evidencial_number)
    {
        if (($model = debt::findOne(['evidencial_number' => $evidencial_number])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
