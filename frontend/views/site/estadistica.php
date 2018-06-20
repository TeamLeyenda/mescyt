<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//$this->title = 'Acceso - MESCyT';
$this->params['breadcrumbs'][] = $this->title='Estadística';
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Aquí verá todo lo que necesita saber de las estadísticas de las conferencias y eventos.</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                
                
                

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
