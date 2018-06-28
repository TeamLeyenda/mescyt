<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->presentadorPresentacions,
        'key' => function($model){
            return ['presentador_id' => $model->presentador_id, 'presentacion_id' => $model->presentacion_id];
        }
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'presentador.id',
                'label' => Yii::t('app', 'Presentador')
            ],
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'presentador-presentacion'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
