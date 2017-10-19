<?php

use yii\helpers\ArrayHelper;

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = ArrayHelper::merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'name' => 'Клиентская база',
    'basePath' => dirname(__DIR__),
    //'timeZone' => 'Europe/Moscow',
    'aliases' => [
     //   '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        // '@myext' => '@vendor/mycompany/myext',
    ],
    /*'bootstrap' => [
        'log',
        'bootstrap\Setup',
    ],*/

    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'charset' => 'utf8',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
        ],
        'authManager' => [
            'class' => 'elisdn\hybrid\AuthManager',
            'modelClass' => 'app\components\UserIdentity',
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'forceTranslation' => true,
                ],
            ],
        ],

        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'defaultTimeZone' => 'Europe/Moscow',
            // 'timeZone' => 'GMT+3',
            // 'dateFormat' => 'd MMMM yyyy',
            // 'datetimeFormat' => 'd-M-Y H:i:s',
            'timeFormat' => 'H:m',
        ],

        /*'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mail',
            'htmlLayout' => 'layouts/main-html',
            'textLayout' => 'layouts/main-text',
            'messageConfig' => [
                //  'charset' => 'cp-1251',
                'from' => ['noreply@site.com' => 'Site Name'],
            ],
            'useFileTransport' => false,
        ],*/
        /*'sms' => [
            'class' => 'Zelenin\yii\extensions\Sms',
            'api_id' => '62079CC5-3241-F4BC-A04A-2354B662497F'
        ],*/
        'cache' => [
            'class' => 'yii\caching\DummyCache',
        ],
        'log' => [
            'class' => 'yii\log\Dispatcher',
        ],
    ],
    'params' => $params,
];
