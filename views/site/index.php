<?php

/* @var $this yii\web\View */

use app\models\CarModel;
use app\models\Order;
use app\models\User;
use yii\helpers\Url;

$this->title = 'Carent';
?>
<div class="site-index">
        <div class="container sliderkek">
            <div class="row">
                <div class="col-sm-12">
                    <div id="tutorial-slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#tutorial-slider" data-slide-to="0"></li>
                            <li data-target="#tutorial-slider" data-slide-to="1"></li>
                            <li data-target="#tutorial-slider" data-slide-to="2"></li>
                            <li data-target="#tutorial-slider" data-slide-to="3"></li>
                            <li data-target="#tutorial-slider" data-slide-to="4"></li>
                            <li data-target="#tutorial-slider" data-slide-to="5"></li>
                        </ol>
                        <!-- indicators dot now -->
                        <!-- wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="public/slider/slide1.JPG">
                                <div class="carousel-caption">
                                    <h3></h3>
                                    <p></p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="public/slider/slide2.JPG">
                                <div class="carousel-caption">
                                    <h3></h3>
                                    <p></p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="public/slider/slide3.JPG">
                                <div class="carousel-caption">
                                    <h3></h3>
                                    <p></p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="public/slider/slide4.JPG">
                                <div class="carousel-caption">
                                    <h3></h3>
                                    <p></p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="public/slider/slide5.JPG">
                                <div class="carousel-caption">
                                    <h3></h3>
                                    <p></p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="public/slider/slide6.JPG">
                                <div class="carousel-caption">
                                    <h3></h3>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <!-- controls or next and prev buttons -->
                        <div>
                            <a href="#tutorial-slider" class="left carousel-control" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a href="#tutorial-slider" class="right carousel-control" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Вітаємо на нашому сайті!</h1>
                    <p class="lead">Оберіть свій автомобіль:</p>
                    <p><a class="btn btn-lg btn-info" href="/site/cars">Обрати автомобіль</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="text-center">
            <h2>Найпопулярніші авто:</h2>
        </div>
        <?php
        $carm = CarModel::find()->orderBy(['popualrity' => SORT_DESC])->limit(3)->all();
        foreach($carm as $car_): ?>
            <div class="col col-lg-4">
                <div class="container cartop">
                    <a href="<?=Url::toRoute(['site/view','id'=>$car_->id]) ?>">
                            <img class="" src="<?=$car_->getPicture();?>">

                            <h5>
                                <?=$car_->name;?>
                            </h5>
                            <h5>
                                Ціна: <?=$car_->price;?> грн.
                            </h5>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="container">
        <div class="text-center">
            <h2>Наші досягнення:</h2>
        </div>
        <?php
        $carcount = Count(CarModel::find()->all());
        $ordercount = Count(Order::find()->all());
        $usercount = Count(User::find()->all());
        ?>
        <div class="col text-center col-lg-4">
                <div class="container cartop">
                        <img class="img-achievement" src="web/comunity.png">
                        <h4  class="text-center">
                           <?php echo $usercount ?> зареєстрованих користувачів.
                        </h4>
                </div>
        </div>

        <div class="col text-center col-lg-4">
            <div class="container cartop">
                <img class="img-achievement img-orderoico" src="web/orderico.png">
                <row>

                    <h4  class="text-center">
                        <?php echo $ordercount ?> здійснених бронювань.
                    </h4>
                </row>
            </div>
        </div>

        <div class="col text-center col-lg-4">
            <div class="container cartop">
                <img class="img-achievement" src="web/carico.png">
                <h4  class="text-center">
                    <?php echo $carcount ?> доступних автомобілів.
                </h4>
            </div>
        </div>
    </div>
</div>
