<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Afiliacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="afiliacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Afiliacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
