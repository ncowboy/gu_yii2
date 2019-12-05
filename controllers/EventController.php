<?php

namespace app\controllers;

use app\models\Events;
use app\models\User;

class EventController extends \yii\web\Controller
{
    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdate()
    {
        $model = new Event();
        return $this->render('update', [
            'model'=> $model
        ]);
    }
}
