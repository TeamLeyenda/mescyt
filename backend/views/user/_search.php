<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Username']) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true, 'placeholder' => 'Auth Key']) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true, 'placeholder' => 'Password Hash']) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true, 'placeholder' => 'Password Reset Token']) ?>

    <?php /* echo $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) */ ?>

    <?php /* echo $form->field($model, 'status')->textInput(['placeholder' => 'Status']) */ ?>

    <?php /* echo $form->field($model, 'created_at')->textInput(['placeholder' => 'Created At']) */ ?>

    <?php /* echo $form->field($model, 'updated_at')->textInput(['placeholder' => 'Updated At']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
