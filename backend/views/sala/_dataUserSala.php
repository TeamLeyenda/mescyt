<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->userSalas,
        'key' => function($model){
            return ['user_id' => $model->user_id, 'sala_id' => $model->sala_id];
        }
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'user.Nombre',
            'label' => Yii::t('app', 'Nombre')
                ],
            
            ['attribute' => 'user.Apellido',
            'label' => Yii::t('app', 'Apellido')
                ],
            
            ['attribute' =>'user.username',
            'label' => Yii::t('app', 'Usuario')
                ],

            ['attribute' => 'user.email',
            'label' => Yii::t('app', 'Email')
                ],

            ['attribute' => 'user.Telefono',
            'label' => Yii::t('app', 'Telefono')
            ],
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'user-sala'
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
