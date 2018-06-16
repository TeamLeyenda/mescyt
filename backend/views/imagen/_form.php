<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Imagen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="imagen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'presentador_id')->textInput() ?>

    <?= $form->field($model, 'Perfil')->textInput() ?>

    <?= $form->field($model, 'Nombre_Imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Tamano')->textInput() ?>

    <?= $form->field($model, 'Tipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Ruta')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
