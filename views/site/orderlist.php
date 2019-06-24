<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\widgets\LinkPager;
use yii\helpers\Url;


$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <h2 class="text-center">Список бронювань</h2>

                <?php
                ArrayHelper::multisort($orders, ['active'], [SORT_ASC]);
                foreach($orders as $order): ?>
                    <order class="post col-lg-12">
                        <div class="post-thumb">
                            <?php
                            $carmodel = \app\models\CarModel::findOne($order->car_id);
                            ?>
                            <p>
                               Автомобіль: <?= $carmodel->name ?>
                            </p>
                            <p>
                                Дата початку оренди: <?= $order->date ?>
                            </p>
                            <p>
                                Термін оренди: <?= $order->term ?> дні
                            </p>
                            <p>
                                Ціна оренди: <?= $order->price ?>
                            </p>
                            <p>
                                Статус: <?php
                                if($order->active==0){
                                    echo '<span class='.'"text-warning"'.'>Заброньовано<span>';
                                }
                                if($order->active==1)
                                {
                                    echo '<span class='.'"text-success"'.'>Завершено<span>';
                                }
                                if($order->active==2)
                                {
                                    echo '<span class='.'"text-info"'.'>Активне<span>';
                                }
                                if($order->active==3)
                                {
                                    echo '<span class='.'"text-danger"'.'>Відмінено<span>';
                                }
                                ?>
                            </>
                        </div>
                        <br>
                        <hr>
                    </order>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <?php
                echo LinkPager::widget([
                    'pagination' => $pagination,
                ])
                ?>
            </div>
        </div>
    </div>
</div>
