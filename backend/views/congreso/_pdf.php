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
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Congreso').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'ubicacion.id',
                'label' => Yii::t('app', 'Ubicacion')
            ],
        [
                'attribute' => 'horario.id',
                'label' => Yii::t('app', 'Horario')
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Conferencia')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnConferencia
    ]);
}
?>
    </div>
</div>
