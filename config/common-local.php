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
        'mailer' => [
            'useFileTransport' => true,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];