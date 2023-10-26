<?php
//serves as a menu for selecting the administration of records in the database
namespace app\controllers;
use Yii;

class AdministrationController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        else return $this->render('\index');
    }

}
