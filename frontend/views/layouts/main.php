<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/img/color.png',['height'=>"255"]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar',
        ],
    ]);
    
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index'],'options'=>['class'=>'nav-link waves-effect']],
        ['label' => 'About', 'url' => ['/site/about'] ,'options'=>['class'=>'nav-link waves-effect']],
        ['label' => 'Contact', 'url' => ['/site/contact'],'options'=>['class'=>'nav-link waves-effect']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup'],'options'=>['class'=>'nav-link waves-effect']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login'],'options'=>['class'=>'nav-link waves-effect']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <main class="mt-5 pt-5">
        <div class="container">
        <?= $content ?>
        </div>
    </main>
    <!--Footer-->
    <footer class="page-footer text-center font-small mdb-color darken-2 mt-4 wow fadeIn">

        <!--Call to action-->
        <div class="pt-4">
            <!--
            <a class="btn btn-outline-white" href="#" target="_blank" role="button">Download APP
                <i class="fa fa-download ml-2"></i>
            </a>
            <a class="btn btn-outline-white" href="#" target="_blank" role="button">
                <i class="fa fa-graduation-cap ml-2"></i>
            </a>
        -->
        </div>
        <!--/.Call to action-->

        <hr class="my-4">

        <!-- Social icons -->
        <div class="pb-4">
            <a href="#" target="_blank">
                <i class="fa fa-facebook mr-3"></i>
            </a>

            <a href="#" target="_blank">
                <i class="fa fa-twitter mr-3"></i>
            </a>

            <a href="#" target="_blank">
                <i class="fa fa-youtube mr-3"></i>
            </a>

            <a href="#" target="_blank">
                <i class="fa fa-google-plus mr-3"></i>
            </a>

            <a href="#" target="_blank">
                <i class="fa fa-dribbble mr-3"></i>
            </a>

            <a href="#" target="_blank">
                <i class="fa fa-pinterest mr-3"></i>
            </a>

            <a href="#" target="_blank">
                <i class="fa fa-github mr-3"></i>
            </a>

            <a href="#" target="_blank">
                <i class="fa fa-codepen mr-3"></i>
            </a>
        </div>
        <!-- Social icons -->

        <!--Copyright-->
        <div class="footer-copyright py-3">
            © 2018 MESCyT
        <center>
        <p>
            Av. Máximo Gómez No. 31, esq. Pedro Henríquez Ureña, Santo Domingo, República Dominicana
(809) 731 1100 | Fax: 809-731-1101
info@mescyt.gob.do
        </p>
        </center>
            <a href="http://www.mescyt.gob.do/" target="_blank"> mescyt.gob.do </a>
        </div>
        <!--/.Copyright-->

    </footer>

<?php $this->endBody() ?>
</body>
<script type="text/javascript">
        // Animations initialization
        new WOW().init();
</script>
</html>
<?php $this->endPage() ?>
