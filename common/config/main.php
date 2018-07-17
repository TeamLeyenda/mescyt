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
            //'layout' => 'left-menu', // it can be '@path/to/your/layout'.
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
        'social' => [
            // the module class
            'class' => 'kartik\social\Module',
     
            // the global settings for the Disqus widget
            'disqus' => [
                'settings' => ['shortname' => 'DISQUS_SHORTNAME'] // default settings
            ],
     
            // the global settings for the Facebook plugins widget
            'facebook' => [
                'appId' => 'FACEBOOK_APP_ID',
                'secret' => 'FACEBOOK_APP_SECRET',
            ],
     
            // the global settings for the Google+ Plugins widget
            'google' => [
                'clientId' => 'GOOGLE_API_CLIENT_ID',
                'pageId' => 'GOOGLE_PLUS_PAGE_ID',
                'profileId' => 'GOOGLE_PLUS_PROFILE_ID',
            ],
     
            // the global settings for the Google Analytics plugin widget
            'googleAnalytics' => [
                'id' => 'UA-121995970-1',
                'domain' => 'mescytapp.com',
                'noscript' => 'Analytics cannot be run on this browser since Javascript is not enabled.',
            ],
     
            // the global settings for the Twitter plugin widget
            'twitter' => [
                'screenName' => 'TWITTER_SCREEN_NAME'
            ],
     
            // the global settings for the GitHub plugin widget
            'github' => [
                'settings' => ['user' => 'GITHUB_USER', 'repo' => 'GITHUB_REPO']
            ],
        ],
    ],

    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
            'defaultRoles' => ['admin', 'moderador', 'presentador','participante'],
        ],
        
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
