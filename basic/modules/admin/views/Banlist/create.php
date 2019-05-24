<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Banlist */

$this->title = 'Create Banlist';
$this->params['breadcrumbs'][] = ['label' => 'Banlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banlist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user')->textInput() ?>

    <div class="row">
        <div class="col col-lg-6">
            <?= $form->field($model, 'date_from')->input('date') ?>
        </div>
        <div class="col col-lg-6">
            <?= $form->field($model, 'date_to')->input('date') ?>
        </div>
    </div>

    <?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
