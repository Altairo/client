<?php

return [
    'components' => [
        'db' => [
            'dsn' => 'mysql:host=localhost;dbname=client',
            'username' => 'root',
            'password' => '',
            //'tablePrefix' => 'keys_',
            'charset' => 'utf8',
        ],
        'bootstrap' => [
            'log',
            'bootstrap\SetUp',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
         ],
        'mailer' => [
            'useFileTransport' => true,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];