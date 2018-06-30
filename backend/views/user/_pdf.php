<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'User').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'afiliacion.Afiliacion',
                'label' => Yii::t('app', 'Afiliacion')
            ],
        [
                'attribute' => 'tipoUser.Tipo',
                'label' => Yii::t('app', 'Tipo User')
            ],
        'username',
        ['attribute' => 'auth_key', 'visible' => false],
        'password_hash',
        'email:email',
        'image',
        'Nombre',
        'Apellido',
        'Telefono',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerPresentacionUser->totalCount){
    $gridColumnPresentacionUser = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'presentacion.id',
                'label' => Yii::t('app', 'Presentacion')
            ],
            ];
    echo Gridview::widget([
        'dataProvider' => $providerPresentacionUser,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Presentacion User')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnPresentacionUser
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerUserAreaEspecializacion->totalCount){
    $gridColumnUserAreaEspecializacion = [
        ['class' => 'yii\grid\SerialColumn'],
                [
                'attribute' => 'areaEspecializacion.id',
                'label' => Yii::t('app', 'Area Especializacion')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUserAreaEspecializacion,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'User Area Especializacion')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnUserAreaEspecializacion
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerUserGradoAcademico->totalCount){
    $gridColumnUserGradoAcademico = [
        ['class' => 'yii\grid\SerialColumn'],
                [
                'attribute' => 'gradoAcademico.id',
                'label' => Yii::t('app', 'Grado Academico')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUserGradoAcademico,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'User Grado Academico')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnUserGradoAcademico
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerUserSala->totalCount){
    $gridColumnUserSala = [
        ['class' => 'yii\grid\SerialColumn'],
                [
                'attribute' => 'sala.id',
                'label' => Yii::t('app', 'Sala')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUserSala,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'User Sala')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnUserSala
    ]);
}
?>
    </div>
</div>
