<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//$this->title = 'Acceso - MESCyT';
$this->params['breadcrumbs'][] = $this->title='Eventos - MESCyT';
?>




<div class="site-login">
    <br>
    <h5>Aquí verás todo lo que necesitas saber de nuestras eventos y conferencias.</h5>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                
                
                

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>