   <?php

    Yii::$app->layout='homepage';
    $this->params['breadcrumbs'][] = $this->title='Inicio - MESCyT';

   $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/themes/agency/dist');
   ?>
   
   <!-- Header
    <header>
        <div class="container" style="background-color: #235288; border-color: #235288">
            <div class="intro-text">
                <div class="intro-heading"></div>
                <div class="intro-lead-in" style="color: #FFFFFF">¡BIENVENIDO A CEICYT RD-2018!</div>
                <br>
                <a href="http://www.mescyt.gob.do" class="page-scroll btn btn-xl" style="background-color: #5499C7; border-color: #235288; color:#FFFFFF">Ir a MESCyT</a>
            </div>
            <br>
        </div>
    </header>
     -->

    <?= $this->render('_service.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_portfolio.php',['directoryAsset'=>$directoryAsset ]) ?>
    
    