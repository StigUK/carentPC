<?php

/* @var $this yii\web\View */

use app\models\Userinfo;
use yii\helpers\Html;

$this->title = 'UserPage';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
    $userinfo = Userinfo::find()->where(['user'=>Yii::$app->user->id])->one();
?>
<div class="container userpage" align="center">

    <h2>Сторінка користувача</h2>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col col-sm-6">
                <div class="row">
                    <img class="userphoto img-circle img-fluid img-thumbnail" src="../uploads/User/<?=$userinfo->photo_user?>">
                    <img class="verphoto" src="../images/<?php
                    if(Yii::$app->user->identity->active==0)
                    {
                        echo 'notverificated.png';
                        echo '"';
                        echo ' title="Користувач не підтверджений"';
                    }
                    else
                    {
                        echo 'verificated.png';
                        echo '"';
                        echo ' title="Користувач підтверджений"';
                    }
                    ?>">
                </div>
                <hr>
                <div class="row">
                    <div class="col col-lg-6 btnuser">
                        <a class="btn btn-subscribe" href="passchange">Змінити пароль</a>
                    </div>
                    <div class="col col-lg-6 btnuser">
                        <a class="btn btn-subscribe" href="setuimage">Змінити фото профілю</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col col-lg-6 btnuser">
                        <a class="btn btn-subscribe" href="setdimage">Завантажити фото ліцензії</a>
                    </div>
                    <div class="col col-lg-6 btnuser">
                        <a class="btn btn-subscribe" href="setpimage">Завантажити фото паспорту</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <a class="btn btn-subscribe" href="editprofile">Редагувати інформацію користувача</a>
                </div>
            </div>
            <div class="col col-sm-6 userinfo">
                <div class="row">
                    <div class="col col-lg-3">
                        <h4>Логін</h4>
                    </div>
                    <div class="col col-lg-3">
                        <h4><?= Yii::$app->user->identity->login?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-lg-3">
                        <h4>E-mail</h4>
                    </div>
                    <div class="col col-lg-3">
                        <h4><?= Yii::$app->user->identity->email?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-lg-3">
                        <h4>Прізвище</h4>
                    </div>
                    <div class="col col-lg-3">
                        <h4><?= $userinfo->first_name;?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-lg-3">
                        <h4>Ім'я</h4>
                    </div>
                    <div class="col col-lg-3">
                        <h4><?= $userinfo->second_name;?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-lg-3">
                        <h4>По батькові</h4>
                    </div>
                    <div class="col col-lg-3">
                        <h4><?= $userinfo->middle_name;?></h4>
                    </div>
                </div>
                <br>
                <div class="row col-sm-12">
                    <h4> Водійське посвідчення:</h4>
                </div>
                <div class="row">
                    <div class="col col-lg-3">
                        <h4>Номер</h4>
                    </div>
                    <div class="col col-lg-3">
                        <h4><?= $userinfo->license_id;?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-lg-3">
                        <h4>Дата видачі</h4>
                    </div>
                    <div class="col col-lg-3">
                        <h4><?= $userinfo->license_date;?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <a class="btn btn-danger" href="../auth/logout">Вийти</a>
        </div>
    </div>
        <br>
        <br>
        <br>
</div>
