<?php


return [
    'components' => [
        'request' => [
            'cookieValidationKey' => 'jT_toCjY2bDnVOK26rHRsRn5-ng01LoO7',
        ],
        'assetManager' => [
            'linkAssets' => true,
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error'],
                    'logFile' => '@app/runtime/logs/web-error.log'
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['warning'],
                    'logFile' => '@app/runtime/logs/web-warning.log'
                ],
            ],
        ],
    ],
];