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

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'institucion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area_tematica')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modalidad_presentacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
