<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        //'@mdm/admin' => '@app/vendor/mdm/yii2-admin-2.8',
        // for example: '@mdm/admin' => '@app/extensions/mdm/yii2-admin-2.0.0',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',

    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu', // it can be '@path/to/your/layout'.
            'mainLayout' => '@backend/views/layouts/main.php',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    //'userClassName' => 'common\models\User',
                    'userClassName' => 'mdm\admin\models\User',
                    'idField' => 'user_id'
                ],
                /*
                'other' => [
                    'class' => 'path\to\OtherController', // add another controller
                ],
                */
            ],
            
            'menus' => [

                'menu' => null, // disable menu route
            ]
            
        ],
    ],

    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
            'defaultRoles' => ['administrador', 'moderador', 'presentador','participante'],
        ],
        
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
