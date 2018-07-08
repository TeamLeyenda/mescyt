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
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Usuario').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            <?= Html::a(Yii::t('app', 'Guardar nuevo'), ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'Nombre',
        'Apellido',
        [
            'attribute' => 'afiliacion.Afiliacion',
            'label' => Yii::t('app', 'Afiliacion'),
        ],
        [
            'attribute' => 'tipoUser.Tipo',
            'label' => Yii::t('app', 'Tipo User'),
        ],
        'username',
        'email:email',
        'Telefono',
        'image',
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-presentacion-user']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Presentacion User')),
        ],
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-user-area-especializacion']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'User Area Especializacion')),
        ],
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-user-grado-academico']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'User Grado Academico')),
        ],
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-user-sala']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'User Sala')),
        ],
        'columns' => $gridColumnUserSala
    ]);
}
?>
    </div>
</div>