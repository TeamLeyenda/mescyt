<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PresentacionUser', 
        'relID' => 'presentacion-user', 
        'value' => \yii\helpers\Json::encode($model->presentacionUsers),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'UserAreaEspecializacion', 
        'relID' => 'user-area-especializacion', 
        'value' => \yii\helpers\Json::encode($model->userAreaEspecializacions),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'UserGradoAcademico', 
        'relID' => 'user-grado-academico', 
        'value' => \yii\helpers\Json::encode($model->userGradoAcademicos),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'UserSala', 
        'relID' => 'user-sala', 
        'value' => \yii\helpers\Json::encode($model->userSalas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'afiliacion_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Afiliacion::find()->orderBy('id')->asArray()->all(), 'id', 'Afiliacion'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Afiliacion')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'tipo_user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\TipoUser::find()->orderBy('id')->asArray()->all(), 'id', 'Tipo'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Tipo user')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Username']) ?>

    <?= $form->field($model, 'auth_key', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true, 'placeholder' => 'Password Hash']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true, 'placeholder' => 'Image']) ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre']) ?>

    <?= $form->field($model, 'Apellido')->textInput(['maxlength' => true, 'placeholder' => 'Apellido']) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true, 'placeholder' => 'Telefono']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'PresentacionUser')),
            'content' => $this->render('_formPresentacionUser', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->presentacionUsers),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'UserAreaEspecializacion')),
            'content' => $this->render('_formUserAreaEspecializacion', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->userAreaEspecializacions),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'UserGradoAcademico')),
            'content' => $this->render('_formUserGradoAcademico', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->userGradoAcademicos),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'UserSala')),
            'content' => $this->render('_formUserSala', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->userSalas),
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
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
    <?php if(Yii::$app->controller->action->id != 'create'): ?>
        <?= Html::submitButton(Yii::t('app', 'Save As New'), ['class' => 'btn btn-info', 'value' => '1', 'name' => '_asnew']) ?>
    <?php endif; ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
