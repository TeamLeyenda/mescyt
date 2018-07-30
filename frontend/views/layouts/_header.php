<?php
use yii\helpers\Url;
use yii\helpers\Html;
<<<<<<< HEAD

=======
>>>>>>> 7bcd7132fe053362b9fb2c2bbb08e92a65a16a66
?>
    <nav class="col-lg-12 text-center" style="background-color: #235288; border-color: #235288">
        <a type="button" class="btn btn-secondary" href="<?= Url::to(['/site/index'])?>" style="color:white; font-family: arial">Inicio</a>
        <a type="button" class="btn btn-secondary" href="<?= Url::to(['/site/about'])?>" style="color:white; font-family: arial">Congresos Pasados</a>
        <a type="button" class="btn btn-secondary" href="<?= Url::to(['/site/contact'])?>" style="color:white; font-family: arial">Sobre CEICYT</a>
        <a type="button" class="btn btn-secondary" href="<?= Url::to(['/site/presentacion'])?>" style="color:white; font-family: arial">Programa</a>
        <a type="button" class="btn btn-secondary" href="<?= Url::to(['/site/client'])?>" style="color:white; font-family: arial">Inscripción</a>
        <a type="button" class="btn btn-secondary" href="<?= Url::to(['/site/team'])?>" style="color:white; font-family: arial">Sometimiento de Trabajo</a>
        <a type="button" class="btn btn-secondary" href="<?= Url::to(['/site/servicio'])?>" style="color:white; font-family: arial">Comité Organizador</a>
        <a type="button" class="btn btn-secondary" href="<?= Url::to(['/site/contacto'])?>" style="color:white; font-family: arial">Contactos</a>
    <?php    if (Yii::$app->user->isGuest) { ?>
          <a type="button" class="btn btn-secondary" href="<?= Url::to(['/site/login'])?>" style="color:white; font-family: arial">Login</a>
          <a type="button" class="btn btn-secondary" href="<?= Url::to(['/site/signup'])?>" style="color:white; font-family: arial">Sign Up</a>
    <?php   } else { ?>
          <a type="button" class="btn btn-secondary" >" style="color:white; font-family: arial"><?php
             Html::beginForm(['/site/logout'], 'post');
             Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']);
             Html::endForm(); ?>
           </a>
          <a type="button" class="btn btn-secondary" href="#" style="color:white; font-family: arial"><?=Yii::$app->user->identity->username?></a>
    <?php }?>
    </nav>
    <div style="height:50pt;">
    </div>
