<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Conferencia */

$this->title = $model->Fecha_Inicio;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Conferencias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conferencia-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Conferencia').' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'congreso.Nombre',
            'label' => Yii::t('app', 'Congreso'),
        ],
        'Titulo',
        'Institucion',
        'Area_Tematica',
        'Modalidad_Presentacion',
        'Fecha_Inicio',
        'Fecha_Final',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Congreso<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnCongreso = [
        ['attribute' => 'id', 'visible' => false],
        'provincia_id',
        'Nombre',
        'Fecha_Inicio',
        'Fecha_Final',
    ];
    echo DetailView::widget([
        'model' => $model->congreso,
        'attributes' => $gridColumnCongreso    ]);
    ?>
    
    <div class="row">
<?php
if($providerPresentadorConferencia->totalCount){
    $gridColumnPresentadorConferencia = [
        ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'presentador.Nombre',
                'label' => Yii::t('app', 'Presentador')
            ],
                ];
    echo Gridview::widget([
        'dataProvider' => $providerPresentadorConferencia,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-presentador-conferencia']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Presentador Conferencia')),
        ],
        'columns' => $gridColumnPresentadorConferencia
    ]);
}
?>

    </div>
</div>
