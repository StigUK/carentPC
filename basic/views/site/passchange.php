<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Change password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container logform col-lg-offset-4 col-lg-4">
    <div class="site-login">

        <h2>Зміна паролю користувача</h2>
        <hr>
        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($user, 'currentPassword')->passwordInput()?>
            <?= $form->field($user, 'newPassword')->passwordInput()?>
            <?= $form->field($user, 'newPasswordConfirm')->passwordInput()?>
            <div class="text-center">
                <?= Html::submitButton('Змінити пароль',['class'=>'btn btn-primary']) ?>
            </div>
            <br>
        <?php ActiveForm::end(); ?>

    </div>

</div>
