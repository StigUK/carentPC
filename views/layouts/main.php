<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\PublicAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<style>
    color: red;
</style>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'CaRent',
        'brandImage' => 'http://carent.zzz.com.ua/web/public/images/logo.png',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right nav-custom'],
        'items' => [
            ['label' => '  Про сайт', 'url' => ['/site/about']],
            ['label' => '  Історія бронювань', 'url' => ['/site/orders']],
            ['label' => '  Обрати автомобіль', 'url' => ['/site/cars']],
            /*Yii::$app->user->identity->role ? (
                ['label' => '   Адміністративна частина', 'url' => ['/admin']]
            ):
            (
             []
            ),*/
            Yii::$app->user->isGuest ? (
                ['label' => 'Авторизація', 'url' => ['/auth/login']]
            ) : (
                /*'<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->getId() . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'*/
                ['label' => Yii::$app->user->identity->login, 'url' => ['/site/userpage']]
            )
        ],

    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="body-content">
            <h1 align="center">
                Контакти
            </h1>
            <div class="row">
                <div class="col-lg-4">
                    <h2>Як з нами зв'язатись</h2>
                    <p>
                    <h4>Телефон</h4>
                    +38 097 060 6449<br>
                    <h4>Email</h4>
                    prusbogdan2@gmail.com<br>
                    <h4>Факс</h4>
                    У нас немає факсу))0)<br>
                    <h4>Skype</h4>
                    bogdan_prus<br>
                    <h4>Telegram</h4>
                    <a href="http://t.me/prusb" class="none-text-decoration">t.me/prusb</a><br>
                    </p>
                </div>
                <div class="col-lg-4" align="center">
                    <h2>Де нас знайти</h2>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2594.725978684877!2d27.004193733625367!3d49.432994370803016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473207a957d41c17%3A0xd5a40cbcd4976b2a!2z0LLRg9C70LjRhtGPINCX0LDRgNGW0YfQsNC90YHRjNC60LAsIDEwLCDQpdC80LXQu9GM0L3QuNGG0YzQutC40LksINCl0LzQtdC70YzQvdC40YbRjNC60LAg0L7QsdC70LDRgdGC0YwsIDI5MDAw!5e0!3m2!1suk!2sua!4v1550626375135" width="" height="auto" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-lg-4">
                    <h2>Наші адреси</h2>

                    <p>
                    <h4>Хмельницький</h4>
                    Зарічанька 10<br>
                    <h4>Нью-йорк</h4>
                    Манхетен, бродвєй<br>
                    <h4>Антарктида</h4>
                    Офіс тимчасово не працює<br>
                    </p>
                </div>
            </div>

        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
