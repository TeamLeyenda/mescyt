<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Presentacion */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentacion-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Presentacion').' '. Html::encode($this->title) ?></h2>
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
            <?= Html::a(Yii::t('app', 'Guardar como nuevo'), ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
        [
            'attribute' => 'sala.Nombre_Sala',
            'label' => Yii::t('app', 'Sala'),
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
if($providerPresentacionUser->totalCount){
    $gridColumnPresentacionUser = [
        ['class' => 'yii\grid\SerialColumn'],
                        [
                'attribute' => 'user.username',
                'label' => Yii::t('app', 'Usuario')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPresentacionUser,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-presentacion-user']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Usuarios')),
        ],
        'columns' => $gridColumnPresentacionUser
    ]);
}
?>
    </div>
</div>