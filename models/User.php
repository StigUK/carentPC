<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $role
 * @property int $active
 *
 * @property Banlist[] $banlists
 * @property Order[] $orders
 * @property Userinfo[] $userinfos
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $currentPassword;
    public $newPasswordConfirm;
    public $newPassword;

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['role', 'active'], 'integer'],
            [['login', 'email'], 'string', 'max' => 255],
            [['newPassword','currentPassword','newPasswordConfirm'], 'required'],
            [['currentPassword'],'validateCurrentPassword'],
            [['newPassword','newPasswordConfirm'], 'string', 'min'=>3],
            [['newPassword','newPasswordConfirm'], 'filter', 'filter'=>'trim'],
            [['newPasswordConfirm'], 'compare', 'compareAttribute'=>'newPassword', 'message' => 'Паролі не співпадають'],
        ];
    }
    public function validateCurrentPassword()
    {
        if(!$this->verifyPassword(!$this->currentPassword)){
            $this->addError('currentPassword','Не вірний пароль!');
        }
    }

    public function verifyPassword($password)
    {
        $dbpassword = static::findOne(['id' => Yii::$app->user->id])->password;
        if($password==$dbpassword)
            return true;
        else return false;
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Password',
            'role' => 'Role',
            'active' => 'Active',
        ];
    }


    public function getBanlists()
    {
        return $this->hasMany(Banlist::className(), ['user' => 'id']);
    }

    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['user_id' => 'id']);
    }

    public function getUserinfos()
    {
        return $this->hasMany(Userinfo::className(), ['user' => 'id']);
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {

    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
    public static function findByUsername($username)
    {
        return User::find()->where(['login'=>$username])->one();
    }

    public function validatePassword($password)
    {
        return ($this->password == $password) ? true : false;
    }

    public function create($password)
    {
        $userinfo = new Userinfo();
        $this->password=$password;
        $this->save(false);
        $userinfo->user=$this->id;
        return $userinfo->save(false);
    }

}
