<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Provincia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="provincia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pais_id')->textInput() ?>

    <?= $form->field($model, 'Provincia')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
