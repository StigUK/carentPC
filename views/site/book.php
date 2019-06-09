<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

use yii\widgets\ActiveForm;
$this->title = 'Book';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about" align="center">

    <div class="container">
        <?php
            if(Yii::$app->session->hasFlash('success')): ?>
            <div class="col col-sm-12 alert alert-success alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php
                echo Yii::$app->session->getFlash('success');
                ?>
            </div>
        <?php
            endif;
        ?>
        <?php
        if(Yii::$app->session->hasFlash('error')): ?>
            <div class="col col-sm-12 alert alert-error alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php
                echo Yii::$app->session->getFlash('error');
                ?>
            </div>
        <?php
        endif;
        ?>
    </div>
    <carmodel class="post">
        <div class="container car-view">
            <h1>Бронювання</h1>
            <h1><?=$carmodel->name;?></h1>
            <div class="datepicker">
                <script>
                    var price=0;
                    var days = 0;
                    var totalprice=0;
                    var input0 = document.getElementById("order-term");
                    //input0.setAttribute("autocomplete","off");
                    /*input0.onchange = function()
                    {
                            calcprice();
                    }*/
                    function checkdate() {
                        Date1 = new Date(input0.value);
                        DateNow = Date.now();
                        if(isValidDate(Date1))
                        {
                            if(Date1>=DateNow){
                                return true;
                            }
                            if(Date1<DateNow){
                                input0.value="";
                                alert("Произошол конфликт");
                                return false;
                            }
                        }
                        else {return false;}
                    }
                    function isValidDate(value){
                        var dateWrapper = new Date(value);
                        return !isNaN(dateWrapper.getDate());
                    }
                    function calcprice() {
                        getprice();
                        totalprice = price * days;
                        outputprice();
                    }
                    function outputprice() {

                        var theElement = document.getElementById("totalprice");
                        theElement.innerHTML = totalprice;
                    }
                    function getprice() {
                        var theElement = document.getElementById("price");
                        price = parseInt(theElement.textContent);
                    }
                    function getdays() {
                        var theElement = document.getElementById("order-term");
                        days = parseInt(theElement.textContent);
                    }
                </script>
                <h4>
                    <?php
                    $form = ActiveForm::begin();
                    ?>
                    <hr>
                    <div class="row">
                        <div class="col col-lg-12">
                            <?= $form->field($order, 'date')->input('date')?>
                            <?= $form->field($order, 'term')->input('number',['min'=>1,'autocomplete'=>'off'])?>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col col-lg-8">
                            Ціна у день = <span id="price"> <?php
                                echo $carmodel->price;
                                ?></span> грн.
                        </div>
                    </div>

                    <br>
                    <?php /*<div class="row">
                        <div class="col col-lg-12">
                            Фінальна = <span id="totalprice">0</span> грн.
                        </div>
                    </div>
  */ ?>
                    <hr>
                    <div class="row">
                        <div class="col col-lg-12">
                            <?=Html::submitButton('Замовити', ['class'=>'btn btn-success']) ?>
                        </div>
                    </div>
                    <?php
                    ActiveForm::end();
                    ?>
                </h4>
                <div id="liqpay_checkout"></div>
                <form method="POST" action="https://www.liqpay.ua/api/3/checkout" accept-charset="utf-8">
                    <input type="hidden" name="data" value="eyJwdWJsaWNfa2V5Ijoic2FuZGJveF9pMzk4NjExOTU5NTMiLCJ2ZXJzaW9uIjoiMyIsImFjdGlvbiI6InBheSIsImFtb3VudCI6IjMiLCJjdXJyZW5jeSI6IlVBSCIsImRlc2NyaXB0aW9uIjoidGVzdCIsIm9yZGVyX2lkIjoiMDAwMDAxIn0="/>
                    <input type="hidden" name="signature" value="jGu+HGwurkc5NfyjU4X11AshGfA="/>
                    <input type="image" src="//static.liqpay.ua/buttons/p1ru.radius.png"/>
                </form>
            </div>
        </div>
    </carmodel>
</div>
