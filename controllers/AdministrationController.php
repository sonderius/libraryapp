<?php
//služi na rozcestnik pre volbu administracie zaznamov v db
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
