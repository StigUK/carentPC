<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CarmodelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carmodel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'picture') ?>

    <?php // echo $form->field($model, 'engine_volume') ?>

    <?php // echo $form->field($model, 'engine_type') ?>

    <?php // echo $form->field($model, 'fuel_consumption') ?>

    <?php // echo $form->field($model, 'seats') ?>

    <?php // echo $form->field($model, 'body') ?>

    <?php // echo $form->field($model, 'doors') ?>

    <?php // echo $form->field($model, 'transmission') ?>

    <?php // echo $form->field($model, 'air_conditioning') ?>

    <?php // echo $form->field($model, 'count') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
