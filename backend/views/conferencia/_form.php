<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Conferencia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conferencia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'congreso_id')->textInput() ?>

    <?= $form->field($model, 'horario_id')->textInput() ?>

    <?= $form->field($model, 'Titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Institucion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Area_Tematica')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Modalidad_Presentacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
