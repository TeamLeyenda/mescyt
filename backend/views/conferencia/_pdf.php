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
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Conferencia').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'congreso.Nombre',
                'label' => Yii::t('app', 'Congreso')
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
</div>
