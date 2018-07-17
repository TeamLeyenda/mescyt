   <?php

    Yii::$app->layout='homepage';
    $this->params['breadcrumbs'][] = $this->title='Inicio - MESCyT';

   $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/themes/agency/dist');
   ?>
   <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading"></div>
                <div class="intro-lead-in">¡BIENVENIDO A CEICYT RD-2018!</div>
                <a href="http://www.mescyt.gob.do" class="page-scroll btn btn-xl" style="background-color: #235288; border-color: #235288">Ir a MESCyT</a>
            </div>
        </div>
    </header>

    <?= $this->render('_service.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_portfolio.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_about.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_team.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_client.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_contact.php',['directoryAsset'=>$directoryAsset ]) ?>
    