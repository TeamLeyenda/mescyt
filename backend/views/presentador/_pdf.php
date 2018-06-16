<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Presentador */

$this->title = $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentadors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentador-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Presentador').' '. Html::encode($this->title) ?></h2>
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
        'Nombre',
        'Apellido',
        'Telefono',
        'Correo',
        'Descripcion:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerCatalogo->totalCount){
    $gridColumnCatalogo = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
                'name',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerCatalogo,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Catalogo')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnCatalogo
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerPresentadorAreaEspecializacion->totalCount){
    $gridColumnPresentadorAreaEspecializacion = [
        ['class' => 'yii\grid\SerialColumn'],
                [
                'attribute' => 'areaEspecializacion.id',
                'label' => Yii::t('app', 'Area Especializacion')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPresentadorAreaEspecializacion,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Presentador Area Especializacion')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnPresentadorAreaEspecializacion
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerPresentadorConferencia->totalCount){
    $gridColumnPresentadorConferencia = [
        ['class' => 'yii\grid\SerialColumn'],
                [
                'attribute' => 'conferencia.id',
                'label' => Yii::t('app', 'Conferencia')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPresentadorConferencia,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Presentador Conferencia')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnPresentadorConferencia
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerPresentadorGradoAcademico->totalCount){
    $gridColumnPresentadorGradoAcademico = [
        ['class' => 'yii\grid\SerialColumn'],
                [
                'attribute' => 'gradoAcademico.id',
                'label' => Yii::t('app', 'Grado Academico')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPresentadorGradoAcademico,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Presentador Grado Academico')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnPresentadorGradoAcademico
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerPresentadorSala->totalCount){
    $gridColumnPresentadorSala = [
        ['class' => 'yii\grid\SerialColumn'],
                [
                'attribute' => 'sala.id',
                'label' => Yii::t('app', 'Sala')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPresentadorSala,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Presentador Sala')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnPresentadorSala
    ]);
}
?>
    </div>
</div>
