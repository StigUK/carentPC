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

        <h4>Редагування інформації про корстувача</h4>
        <hr>
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($userinfo, 'first_name')?>
        <?= $form->field($userinfo, 'second_name')?>
        <?= $form->field($userinfo, 'middle_name')?>
        <?= $form->field($userinfo, 'license_id')?>
        <?= $form->field($userinfo, 'license_date')->input('date')?>
        <?= $form->field($userinfo, 'phone_number')?>
        <div class="text-center">
            <?= Html::submitButton('Зберегти',['class'=>'btn btn-primary']) ?>
        </div>
        <br>
        <?php ActiveForm::end(); ?>

    </div>

</div>
