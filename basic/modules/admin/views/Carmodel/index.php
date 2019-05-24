<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarmodelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carmodels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carmodel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Carmodel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category',
            'name',
            'price',
            [
                'format' => 'html',
                'label' => 'picture',
                'value' => function($data){
                    return Html::img($data->getPicture(),['width'=>250]);
                }
            ],
            //'engine_volume',
            //'engine_type',
            //'fuel_consumption',
            //'seats',
            //'body',
            //'doors',
            //'transmission',
            //'air_conditioning',
            //'count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
