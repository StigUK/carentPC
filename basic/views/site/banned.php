<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'You have been banned!';
$ban = \app\models\Banlist::find()->where(['user'=>Yii::$app->user->id])->one();
?>
<link href="css/site.css">
<div class="banned">
    <div class="alert alert-danger">
        <h1>Ваш аккаунт заблоковано!</h1>
    </div>
    <p>
        Дата початку: <?= $ban->date_from ?> <br>
        Дата закінчення: <?= $ban->date_to ?>
    </p>
    <p>
        Причина блокування:<br>
        <?= $ban->reason ?>
    </p>
    <br>
    <br>
    <p>
        Якщо ви вважаєте, що отримали блокування випадково, або ваш аккаунт було взломано зверніться в <a href="contact">службу підтримки</a>!
    </p>
</div>
