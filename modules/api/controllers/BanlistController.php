<?php

namespace app\modules\api\controllers;

use app\models\Banlist;
use yii\web\Response;

class BanlistController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return;
    }

    public function actionGetban($user_id)
    {
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $ban = Banlist::findOne(['user'=>$user_id]);
        if($ban!=null)
        {
            if($ban->active==1)
            {
                return $ban;
            }
            else return null;
        }
        else
        {
            return null;
        }
    }

}
