<?php

namespace app\modules\api\controllers;

use app\models\Banlist;
use app\models\Car;
use app\models\CarModel;
use app\models\Order;
use Yii;
use yii\web\Response;
use yii\helpers\Json;
use yii\helpers\BaseJson;

class OrderController extends \yii\web\Controller
{

    private $private_key = "sandbox_GzUHXjqq6LoXWU2KGAXCbj2o1SB1Wv1ud1nMoRCf";
    private $public_key = "sandbox_i39861195953";

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['getresult']);
        return $actions;
    }

    public $modelClass = 'app\models\Order';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate($user_id, $car_id, $date, $term)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $order = new Order();
        $order->user_id = $user_id;
        $order->car_id = $car_id;
        $order->term = $term;
        $order->date = $date;
        $carmodel = CarModel::findOne(['id' => $car_id]);
        $order->price = $carmodel->price * $term;
        $order->save(false);
        return $order;
    }

    public function actionShowone($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $order = Order::findOne(['id' => $id]);
        if ($order != null) {
            return $order;
        }
        return null;
    }


    public function actionShowall($userid)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $order = Order::find()->where(['user_id' => $userid])->all();
        if (count($order) > 0) {
            return $order;
        } else {
            return null;
        }
    }

    public function actionSetstatus($id, $status)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $order = Order::findOne(['id' => $id]);
        if ($order != null) {
            $order->active = $status;
            $order->save(false);
            return $order;
        }
        return null;
    }

    /**
     *
     */
    public function actionGetresult()
    {
        //\Yii::$app->response->format = Response::FORMAT_JSON;
        $data = yii\helpers\Json::encode(base64_decode(Yii::$app->request->post('data')));
        Yii::info('liqpay',$data);
        $ban = Banlist::findOne(['id'=>2]);
        $ban->reason = "aaa";
        $ban->save(false);
        return;
    }

    public function actionGetlink()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $json_string = array(
            "public_key"=>"sandbox_i39861195953",
        "version"=>"3",
        "action"=>"pay",
        "amount"=>"3",
        "currency"=>"UAH",
        "description"=>"test",
        "order_id"=>"000001");
        $json_str = json_encode($json_string);
        $data = base64_encode(($json_str));
        $private_key = $this->private_key;
        $signature_string_cod = $private_key.$data.$private_key;
        $signature = base64_encode(sha1($signature_string_cod));
        $text = base64_decode(sha1(" jGu+HGwurkc5NfyjU4X11AshGfA="));
        echo $data;
        echo "<br>";
        echo $text;
    }
}
