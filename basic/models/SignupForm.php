<?php

namespace app\models;

use yii\base\Model;

class SignupForm extends Model
{
    public $login;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['login','email','password'], 'required'],
            [['login'],'string'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'email'],
            [['login'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'login']
        ];
    }

    public function signup()
    {
        if($this->validate()){
            $user = new User();
            $user->attributes = $this->attributes;
            return $user->create($this->password);
            /*$user_ = User::findOne($user->id);
            $user_->password=$user->password;
            var_dump($user); die;
            return $user_->save(false);*/
        }
    }
}