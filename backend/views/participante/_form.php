<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Participante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="participante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'afiliacion_id')->textInput() ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Correo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
