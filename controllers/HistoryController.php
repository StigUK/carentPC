<?php
namespace app\controllers;
use app\models\Order;
use yii\web\Controller;

/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 19.06.2019
 * Time: 15:03
 */



class HistoryController extends Controller
{
    public function actionIndex()
    {
        echo 'aa';

    }

    public function actionToday()
    {
        $order = Order::findOne(['>','date','01.06.2019']);
        var_dump($order);
    }
}