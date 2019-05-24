<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Car';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about" align="center">

    <carmodel class="post">
        <h1 align="left"><?= $carmodel->category0->name;?> <?= $carmodel->name;?></h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <img src="<?= $carmodel->getPicture(); ?>">
                </div>
                <div class="col-sm-5 car-view" align="left">
                    <div class="row">
                        <div class="col-lg-6" title="Двигун">
                            <h5><img src="../info-ico/motor.png" class="car-view-ico" alt="Двигун" > <?= $carmodel->engine_type;?>, <?= $carmodel->engine_volume;?></h5>
                        </div>
                        <div class="col-lg-6" title="Витрати палива">
                            <h5><img src="../info-ico/fuel.png" class="car-view-ico" alt="Витрати палива"> <?= $carmodel->fuel_consumption; ?> Л./100КМ</h5>
                        </div>
                        <div class="col-lg-6" title="Тип трансмісії">
                            <h5><img src="../info-ico/gearbox.png" class="car-view-ico" alt="Тип трансмісії" > <?= $carmodel->transmission; ?></h5>
                        </div>
                        <div class="col-lg-6" title="Кондиціонер">
                            <h5><img src="../info-ico/conditioning.png" class="car-view-ico" alt="Кондиціонер"> <?php if($carmodel->air_conditioning==1)
                                {
                                    echo 'З кондиціонером';
                                } else
                                {
                                    echo 'Без кондиціонеру';
                                } ?></h5>
                        </div>
                        <div class="col-lg-6" title="Кількість мість">
                            <h5><img src="../info-ico/seat.png" class="car-view-ico" alt="Кількість мість" > <?= $carmodel->seats; ?></h5>
                        </div>
                        <div class="col-lg-6" title="Тип кузову">
                            <h5><img src="../info-ico/car.png" class="car-view-ico" alt="Тип кузову"> <?= $carmodel->body; ?>, <?= $carmodel->doors; ?> дверний</h5>
                        </div>
                        <div class="col-sm-12">
                            <h3>Ціна за добу: </h3> <h4><?= $carmodel->price;?></h4>
                        </div>
                        <br>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 ">
                            <?= Html::a('Забронювати', ['book', 'id' => $carmodel->id], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <carmodel/>
</div>
