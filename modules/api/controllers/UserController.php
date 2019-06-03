<?php

namespace app\modules\api\controllers;

use app\models\User;
use app\models\Userinfo;
use Yii;
use yii\web\Response;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        Yii::$app->response->redirect("../../");
    }

    public function actionSignin($login, $password)
    {
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $user = User::findOne(['login'=>$login, 'password'=>$password]);
        if($user!=null)return $user;
        else return null;
    }

    public function actionView()
    {
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $car_model = CarModel::find()->all();
        if(count($car_model)>0){
            return $car_model;
        }
        else {
            return array('status'=>true,'data'=>'No CarModels found.');
        }
    }

    public function actionInfo($login)
    {
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $user = User::findOne(['login'=>$login]);
        if($user!=null)
        {
            $userinfo = Userinfo::findOne(['id'=>$user->id]);
            return $userinfo;
        }
        else return null;
    }

}
