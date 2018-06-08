<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Conferencia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conferencia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'moderador_id')->textInput() ?>

    <?= $form->field($model, 'tema')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
