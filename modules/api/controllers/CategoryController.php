<?php

namespace app\modules\api\controllers;

use app\models\Category;
use yii\web\Response;

class CategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCategorylist()
    {
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $categories = Category::find()->all();
        if(count($categories)>0){
            return $categories;
        }
        else {
            return array('status'=>true,'data'=>'No Categories found.');
        }
    }
}
