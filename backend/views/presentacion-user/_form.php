<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PresentacionUser */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="presentacion-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'presentacion_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Presentacion::find()->orderBy('id')->asArray()->all(), 'id', 'Titulo'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Presentacion')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
    <?php if(Yii::$app->controller->action->id != 'create'): ?>
        <?= Html::submitButton(Yii::t('app', 'Guardar nuevo'), ['class' => 'btn btn-info', 'value' => '1', 'name' => '_asnew']) ?>
    <?php endif; ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
