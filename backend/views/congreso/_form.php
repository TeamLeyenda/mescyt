<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Congreso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="congreso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ubicacion_id')->textInput() ?>

    <?= $form->field($model, 'horario_id')->textInput() ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
