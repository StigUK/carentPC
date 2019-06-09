<?php

namespace app\modules\api\controllers;

use app\models\CarModel;
use app\models\ImageUpload;
use app\models\User;
use app\models\Userinfo;
use Faker\Provider\Image;
use Yii;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\web\UploadedFile;

class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';

    public function actionIndex()
    {
        Yii::$app->response->redirect("../../");
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['uploadphoto']);
        return $actions;
    }


    public function actionSignin($login, $password)
    {
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $user = User::findOne(['login'=>$login, 'password'=>$password]);
        if($user!=null)return $user;
        else return null;
    }

    public function actionCheck($login, $password)
    {
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $user = User::findOne(['login'=>$login, 'password'=>$password]);
        if($user!=null)return $user;
        else return null;
    }

    public function actionSignup($login, $email, $password)
    {
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $user1 = User::findOne(['login'=>$login]);
        $user2 = User::findOne(['email'=>$email]);
        if(($user1==null)&&($user2==null))
        {
            $user = new User();
            $user->login = $login;
            $user->email = $email;
            $user->password = $password;
            $user->save(false);
            $newuser = User::findOne(['login'=>$login]);
            $userinfo = new Userinfo();
            $userinfo->user=$newuser->id;
            $userinfo->photo_user="no_image.png";
            $userinfo->save(false);
            return $newuser;
        }
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

    public function actionInfo($id)
    {
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $userinfo = Userinfo::findOne(['user'=>$id]);
        if($userinfo!=null)
        {
            return $userinfo;
        }
        else return null;
    }

    public function actionSetdate($date, $login)
    {
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $user = User::findOne(['login'=>$login]);
        if($user!=null)
        {
            $userinfo = Userinfo::findOne(['user'=>$user->id]);
            if($userinfo !=null)
            {
                $userinfo->license_date=$date;
                $userinfo->save(true);
                return 1;
            }
        }
        else return null;
    }

    public function actionSetinfo($userid, $email, $firstname, $secondname, $middlename, $phonenumber, $idlicense, $datelicense)
    {
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $user = User::findOne(['id'=>$userid]);
        if($user!=null)
        {
            $userinfo = Userinfo::findOne(['user'=>$userid]);
            $user->email = $email;
            $user->active=0;
            $user->save(false);
            if($userinfo!=null)
            {
                $userinfo->license_date=$datelicense;
                $userinfo->license_id=$idlicense;
                $userinfo->first_name=$firstname;
                $userinfo->second_name=$secondname;
                $userinfo->middle_name=$middlename;
                $userinfo->phone_number=$phonenumber;
                $userinfo->save(true);
                return true;
            }
            else return false;
        }
        else return false;
    }

    public function actionChangepassword($login, $oldpassword, $newpassword)
    {
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $user = User::findOne(['login'=>$login]);
        if ($user->password==$oldpassword)
        {
            $user->password=$newpassword;
            $user->save(false);
            return true;
        }
        else
            return false;
    }

    public $documentPath = 'documents/';

    public function verbs()
    {
        $verbs = parent::verbs();
        $verbs[ "upload" ] = ['POST' ];
        return $verbs;
    }

    public function actionUploadphoto($userid)
    {
        $userinfo = Userinfo::findOne(['user'=>$userid]);
        $userinfo->photo_passport='a';
        if($userinfo!=null)
        {
            $uploads = \yii\web\UploadedFile::getInstancesByName('upfile');
            if (empty($uploads)){
                return false;
                // handle error reporting somewhere else
            }
            $path =  Yii::getAlias('@web').'uploads/User/';
            foreach ($uploads as $upload){
                $filename = time() .'_'. $upload->name ;
                $userinfo->photo_user=$filename;
                $upload->saveAs($path.$filename);
            }
            $userinfo->save(false);
        }
        return false;
    }

}
