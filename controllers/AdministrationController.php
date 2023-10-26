<?php

namespace app\controllers;

class AdministrationController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
