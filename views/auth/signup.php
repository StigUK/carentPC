<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container logform col-lg-offset-4 col-lg-4">
    <div class="site-login">

        <h2>Реєстрація</h2>
        <hr>
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <br>
        <a href="login">Вже є аккаунт</a>
        <hr>
        <div class="text-center">
            <?= Html::submitButton('Зареєструватись', ['class' => 'btn btn-primary']/*, 'name' => 'login-button']*/)?>
        </div>
        <br>
        <?php ActiveForm::end(); ?>

    </div>

</div>
