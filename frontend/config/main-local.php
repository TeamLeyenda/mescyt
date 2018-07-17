<?php
$config = [
    'components' => [
        'view'=>[
            'theme'=>[
                'pathMap'=>[

                    '@app/views'=>'@frontend/themes/agency/views',

                ]
            ]
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'qTdjsxGlswiNVp6wZGHJkpBSaw1osqKf',
        ],
    ],
];

return $config;