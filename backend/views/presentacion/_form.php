<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Presentacion */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PresentacionUser', 
        'relID' => 'presentacion-user', 
        'value' => \yii\helpers\Json::encode($model->presentacionUsers),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="presentacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'congreso_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Congreso::find()->orderBy('id')->asArray()->all(), 'id', 'Nombre'),
        'options' => ['placeholder' => Yii::t('app', 'Elige Congreso')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'sala_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Sala::find()->orderBy('id')->asArray()->all(), 'id', 'Nombre_Sala'),
        'options' => ['placeholder' => Yii::t('app', 'Elige Sala')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'Titulo')->textInput(['maxlength' => true, 'placeholder' => 'Titulo']) ?>

    <?= $form->field($model, 'Institucion')->textInput(['maxlength' => true, 'placeholder' => 'Institucion']) ?>

    <?= $form->field($model, 'Area_Tematica')->textInput(['maxlength' => true, 'placeholder' => 'Area Tematica']) ?>

    <?= $form->field($model, 'Modalidad_Presentacion')->textInput(['maxlength' => true, 'placeholder' => 'Modalidad Presentacion']) ?>
    
    <?= $form->field($model, 'Fecha_Inicio')->widget(\kartik\widgets\DateTimePicker::classname(), [
        'pluginOptions' => [
            'showMeridian' => true,
            'placeholder' => Yii::t('app', 'Elige Fecha Inicio'),
            'autoclose' => true,
            'format' => 'dd-M-yyyy HH:ii P'
        ],
        'type' => \kartik\widgets\DateTimePicker::TYPE_COMPONENT_PREPEND,
        //'saveFormat' => 'dd-M-yyyy HH:ii P',
        //'ajaxConversion' => true,
        
        
        
    ]); ?>
    <?php
    /*
    echo '<label>Start Date/Time</label>';
    echo DateTimePicker::widget([
        'name' => 'Fecha_Inicio',
        //'options' => ['placeholder' => 'Select operating time ...'],
        'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
        'convertFormat' => false,
        'pluginOptions' => [
            'format' => 'dd/M/yyyy HH:ii P',
            //'startDate' => '01-Mar-2014 12:00 AM',
            //'todayHighlight' => true
        ]
    ]);
    */
    ?>
    <?= $form->field($model, 'Fecha_Final')->widget(\kartik\widgets\DateTimePicker::classname(), [
        'type' => \kartik\widgets\DateTimePicker::TYPE_COMPONENT_PREPEND,
        //'saveFormat' => 'dd-M-yyyy HH:ii P',
        //'ajaxConversion' => true,
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Elige Fecha Final'),
                'autoclose' => true,
                'format' => 'dd-M-yyyy HH:ii P'
            ]
        
    ]); ?>

    <?= $form->field($model, 'Vinculo')->textInput(['maxlength' => true, 'placeholder' => 'Vinculo']) ?>

    <?= $form->field($model, 'Archivo')->textInput(['placeholder' => 'Archivo']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-user"></i> ' . Html::encode(Yii::t('app', 'Presentadores')),
            'content' => $this->render('_formPresentacionUser', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->presentacionUsers),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Añadir') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
    <?php if(Yii::$app->controller->action->id != 'create'): ?>
        <?= Html::submitButton(Yii::t('app', 'Guardar nuevo'), ['class' => 'btn btn-info', 'value' => '1', 'name' => '_asnew']) ?>
    <?php endif; ?>
        <?= Html::a(Yii::t('app', 'Cancelar'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
