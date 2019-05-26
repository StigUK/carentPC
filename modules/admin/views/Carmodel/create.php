<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Carmodel */

$this->title = 'Create Carmodel';
$this->params['breadcrumbs'][] = ['label' => 'Carmodels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carmodel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <div class="container">
        <div class="col col-lg-6">
            <?= $form->field($model, 'category')->textInput(['type'=>'number','min'=>'0']) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true,'autocomplete'=>'off']) ?>

            <?= $form->field($model, 'price')->textInput(['type'=>'number']) ?>

            <?= $form->field($model, 'engine_volume')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'engine_type')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'fuel_consumption')->textInput() ?>

        </div>
        <div class="col col-lg-6">
            <?= $form->field($model, 'seats')->textInput() ?>
            <?= $form->field($model, 'body')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'doors')->textInput() ?>

            <?= $form->field($model, 'transmission')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'air_conditioning')->textInput(['type'=>'number','max'=>1,'min'=>0]) ?>

            <?= $form->field($model, 'count')->textInput() ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
