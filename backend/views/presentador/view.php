<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Presentador */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentadors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentador-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Presentador').' '. Html::encode($this->title) ?></h2>
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
            <?= Html::a(Yii::t('app', 'Save As New'), ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
        [
            'attribute' => 'afiliacion.Afiliacion',
            'label' => Yii::t('app', 'Afiliacion'),
        ],
        'Nombre',
        'Apellido',
        'Telefono',
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-presentador-area-especializacion']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Presentador Area Especializacion')),
        ],
        'columns' => $gridColumnPresentadorAreaEspecializacion
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-presentador-grado-academico']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Presentador Grado Academico')),
        ],
        'columns' => $gridColumnPresentadorGradoAcademico
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerPresentadorPresentacion->totalCount){
    $gridColumnPresentadorPresentacion = [
        ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'presentacion.id',
                'label' => Yii::t('app', 'Presentacion')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPresentadorPresentacion,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-presentador-presentacion']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Presentador Presentacion')),
        ],
        'columns' => $gridColumnPresentadorPresentacion
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-presentador-sala']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Presentador Sala')),
        ],
        'columns' => $gridColumnPresentadorSala
    ]);
}
?>
    </div>
</div>