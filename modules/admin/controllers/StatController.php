<?php

namespace app\modules\admin\controllers;

class StatController extends \yii\web\Controller
{
    public function actionIndex($y)
    {
        return $this->render('index',['year'=>$y]);
    }

}
