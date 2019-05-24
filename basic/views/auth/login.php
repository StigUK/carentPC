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

        <h2>Вхід в профіль</h2>
        <hr>
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-12\">{input} {label}</div>\n<div class=\"col-lg-12\">{error}</div>",
        ]) ?>
        <br>
        <a href="signup">Немає аккаунту</a>
        <hr>
        <div class="text-center">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary']/*, 'name' => 'login-button']*/)?>
        </div>
        <br>
        <?php ActiveForm::end(); ?>

    </div>

</div>


