<?php

$config = [
    'components' => [
        
        'view' => [
            'theme' => [
                'pathMap' => [
                   '@app/views' => '@backend/themes/admin'
                   //'@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                   //'@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/testing/app'
                ],
            ],
        ],
        

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'eg84D9gCTBmK6fniiawqh8kWTWPaY_Y4',
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        //'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20', '179.53.5.248'], 
        'allowedIPs' => ['*'], 
        'generators' => [ //here
            'crud' => [
                'class' => 'yii\gii\generators\crud\Generator',
                'templates' => [
                    'adminlte' => '@vendor/dmstr/yii2-adminlte-asset/gii/templates/crud/simple',
                ]
                ],
            'angular' => ['class' => 'dee\gii\generators\angular\Generator'],
            'mvc' => ['class' => 'dee\gii\generators\mvc\Generator'],
            'migration' => ['class' => 'dee\gii\generators\migration\Generator'],
        ],
        
    ];

    $config['bootstrap'][] = 'builder';
    $config['modules']['builder'] = [
        'class' => 'tunecino\builder\Module',
        'yiiScript' => dirname(dirname(__DIR__)) . '/yii',
        'commands' => [
            [
                'class' => 'tunecino\builder\generators\migration\Generator'
            ],

            // run default app migration scripts if any
            'yii migrate/up --interactive=0',

            [
                'class' => 'tunecino\builder\generators\model\Generator',
                'defaultAttributes' => [
                    'ns' => 'backend\models',
                    'queryNs' => 'backend\models',
                ],
            ],
            [
                'class' => 'tunecino\builder\generators\crud\Generator',
                'defaultAttributes' => [
                    'baseViewPath' => '@backend/views',
                    'modelNamespace' => 'backend\models',
                    'controllerNamespace' => 'backend\controllers',
                ],
            ]
        ],
    ];
}

return $config;
