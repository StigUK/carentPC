<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 14.03.2019
 * Time: 1:29
 */
namespace app\controllers;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;
use Yii;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        //$model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->signup()){
                return $this->redirect(['../site/index']);
            }
        }
        return $this->render('signup', ['model'=>$model]);
    }

    public function actionTest()
    {
        //$user = User::findOne(2);
        //Yii::$app->user->login($user);
        //var_dump(\Yii::$app->user); die;
        echo Yii::$app->user->isGuest;
        echo Yii::$app->user->identity->login;
        /*if(Yii::$app->user->isGuest)
        {
            echo 'Пользователь гость';
        }
        else
        {
            echo Yii::$app->user->identity->login;
        }*/
    }
}