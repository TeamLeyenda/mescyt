<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Ubicacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ubicacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Pais')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Provincia')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
