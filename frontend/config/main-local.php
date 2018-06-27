<?php

$config = [
    'components' => [
        
        'view'=>[
            'theme'=>[
                'pathMap'=>[

                    '@app/views'=>'@dixonsatit/agencyTheme/views'],

                    '@app/views'=>'@frontend/themes/agency/views'

                ]
            ]
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '1rRyjUfGgqRQsvkP0WLfWD7toUa_BT14',
        ],
    ]
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
                    'ns' => 'frontend\models',
                    'queryNs' => 'frontend\models',
                ],
            ],
            [
                'class' => 'tunecino\builder\generators\crud\Generator',
                'defaultAttributes' => [
                    'baseViewPath' => '@frontend/views',
                    'modelNamespace' => 'frontend\models',
                    'controllerNamespace' => 'frontend\controllers',
                ],
            ]
        ],
    ];
}

return $config;
