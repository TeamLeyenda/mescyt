<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->users,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'afiliacion.Afiliacion',
                'label' => Yii::t('app', 'Afiliacion')
            ],
        'username',
        ['attribute' => 'auth_key', 'visible' => false],
        'password_hash',
        ['attribute' => 'password_reset_token', 'visible' => false],
        'email:email',
        ['attribute' => 'status', 'visible' => false],
        ['attribute' => 'created_at', 'visible' => false],
        ['attribute' => 'updated_at', 'visible' => false],
        'image',
        'Nombre',
        'Apellido',
        'Telefono',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'user'
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
