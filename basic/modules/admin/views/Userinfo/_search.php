<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserinfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userinfo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'middle_name') ?>

    <?= $form->field($model, 'second_name') ?>

    <?= $form->field($model, 'user') ?>

    <?php // echo $form->field($model, 'license_id') ?>

    <?php // echo $form->field($model, 'license_date') ?>

    <?php // echo $form->field($model, 'photo_license') ?>

    <?php // echo $form->field($model, 'photo_user') ?>

    <?php // echo $form->field($model, 'photo_passport') ?>

    <?php // echo $form->field($model, 'phone_number') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
