<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Grado_academico */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grado Academicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grado-academico-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Grado Academico').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'Grado',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerPresentadorGradoAcademico->totalCount){
    $gridColumnPresentadorGradoAcademico = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'presentador.id',
                'label' => Yii::t('app', 'Presentador')
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
</div>
