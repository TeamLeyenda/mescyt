<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Congreso */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Congresos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="congreso-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Congreso').' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'ubicacion.id',
            'label' => Yii::t('app', 'Ubicacion'),
        ],
        [
            'attribute' => 'horario.id',
            'label' => Yii::t('app', 'Horario'),
        ],
        'Nombre',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerConferencia->totalCount){
    $gridColumnConferencia = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        [
                'attribute' => 'horario.id',
                'label' => Yii::t('app', 'Horario')
            ],
            'Titulo',
            'Institucion',
            'Area_Tematica',
            'Modalidad_Presentacion',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerConferencia,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-conferencia']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Conferencia')),
        ],
        'columns' => $gridColumnConferencia
    ]);
}
?>

    </div>
    <div class="row">
        <h4>Horario<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnHorario = [
        ['attribute' => 'id', 'visible' => false],
        'Fecha_Inicio',
        'Fecha_Final',
    ];
    echo DetailView::widget([
        'model' => $model->horario,
        'attributes' => $gridColumnHorario    ]);
    ?>
    <div class="row">
        <h4>Ubicacion<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUbicacion = [
        ['attribute' => 'id', 'visible' => false],
        'Pais',
        'Provincia',
    ];
    echo DetailView::widget([
        'model' => $model->ubicacion,
        'attributes' => $gridColumnUbicacion    ]);
    ?>
</div>
