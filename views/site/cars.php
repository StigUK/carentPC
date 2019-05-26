<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use app\models\CarModel;
use yii\data\Pagination;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\widgets\LinkPager;
use yii\helpers\Url;


$this->title = 'Cars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <h2 class="text-center">Оберіть свій автомобіль</h2>
    <hr>
    <div class="row">
        <div class="col-lg-2 ">
            <p class="text-center">Категорії:</p>
            <div class="container col-lg-12">
                <?php $categories = app\models\Category::getAll();?>
                <?php foreach($categories as $category_): ?>
                    <div class="row">
                        <a class="btn btn-subscribe" href="<?=Url::toRoute(['site/cars','category'=>$category_->id,'sort'=>$_sort]) ?>">
                            <?=$category_->name?>
                        </a>
                    </div>
                <?php endforeach; ?>
                <div class="row">
                    <a class="btn btn-subscribe" href="<?=Url::toRoute(['site/cars','sort'=>$_sort])?>">
                        Усі категорії
                    </a>
                </div>
            </div>

            <br><br>
            <p class="text-center">Сортування:</p>
            <div class="container col-lg-12">
                <div class="row">
                    <a class="btn btn-subscribe" href="<?=Url::toRoute(['site/cars','category'=>$_category->$id,'sort'=>'1'])?>">
                        Ціна ↑
                    </a>
                </div>
                <div class="row">
                    <a class="btn btn-subscribe" href="<?=Url::toRoute(['site/cars','category'=>$_category->$id,'sort'=>'0'])?>">
                        Ціна ↓
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="row">

                <?php
                    if($carmodels!=null):
                ?>
                <?php foreach($carmodels as $carmodel): ?>
                    <carmodel class="post col-lg-6"">
                    <div class="post-thumb">
                        <a href="<?=Url::toRoute(['site/view','id'=>$carmodel->id]) ?>"><img width="10px" src="<?= $carmodel->getPicture(); ?>" alt=""></a>
                        <a href="<?=Url::toRoute(['site/view','id'=>$carmodel->id]) ?>" class="post-thumb-overlay text-center">
                            <div class="text-uppercase text-center">Детальніше</div>
                        </a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><?= $carmodel->category0->name; ?></h6>
                            <h1 class="entry-title"><a href="http://carent/"><?= $carmodel->name?></a></h1>
                            <h6>Ціна: <?= $carmodel->price?> грн. </h6>
                        </header>
                    </div>
                    </carmodel>
                <?php endforeach; ?>
                <?php
                else:
                    echo '<br><br><br>';
                echo '<h3 class="text-center">Автомобілі даної категорії відсутні!</h3>';
                endif;
                ?>
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
