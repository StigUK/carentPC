<?php

namespace app\modules\api\controllers;

use app\models\CarModel;
use yii\web\Response;

class CarmodelController extends \yii\web\Controller
{
    public $enableCsrfValidation=false;
    public function actionIndex()
    {
        echo "kek"; exit;
        return $this->render('index');
    }
    public function actionCreateCarModel()
    {

        \Yii::$app->response->format=Response::FORMAT_JSON;
        $car_model =new CarModel();
        $car_model->scenario=CarModel::SCENARIO_CREATE;
        $car_model->attributes=\Yii::$app->request->post();
        if($car_model->validate())
        {
            $car_model->save();
            return array('status'=>true,'data'=>'CarModel created');
        }
        else{
            return array('status'=>false, 'data'=>$car_model->getErrors());
        }
        //return array('status'=>true);
        //echo "create"; exit;
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

    public function getCarmodel($id)
    {
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $car_model = CarModel::findOne(['id'=>$id]);
        if($car_model!=null){
            return $car_model;
        }
        else {
            return array('status'=>true,'data'=>'No CarModel found.');
        }
    }
}
