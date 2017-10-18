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
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        // '@myext' => '@vendor/mycompany/myext',
    ],
    'bootstrap' => [
        'log',
        'app\modules\admin\Bootstrap',
        'app\modules\main\Bootstrap',
        'app\modules\user\Bootstrap',
        'app\modules\post\Bootstrap',
    ],

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
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'suffix' => '/',
            'rules' => [
                [
                    'class' => 'yii\web\GroupUrlRule',
                    'prefix' => 'admin',
                    'routePrefix' => 'admin',
                    'rules' => [
                        /*  '' => 'default/index',
                          '<_m:[\w\-]+>' => '<_m>/default/index',
                          '<_m:[\w\-]+>/<id:\d+>' => '<_m>/default/view',
                          '<_m:[\w\-]+>/<id:\d+>/<_a:[\w-]+>' => '<_m>/default/<_a>',
                          '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/view',
                          '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_m>/<_c>/<_a>',
                          '<_m:[\w\-]+>/<_c:[\w\-]+>' => '<_m>/<_c>/index', */
                    ],
                ],

                '' => 'user/default/login',
              //  'kod' => 'user/default/askcode',
              //  'contact' => 'main/contact/index',
                '<_a:error>' => 'main/default/<_a>',

                //'admin/post' => 'post/default/index',

                '<_a:(login|logout|signup|email-confirm|password-reset-request|password-reset)>' => 'user/default/<_a>',
                // '<_a:(login|logout|signup|email-confirm|password-reset-request|password-reset)>' => 'post/default/<_a>',

                '<_m:[\w\-]+>' => '<_m>/default/index',
                '<_m:[\w\-]+>/<_c:[\w\-]+>' => '<_m>/<_c>/index',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w-]+>' => '<_m>/<_c>/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/view',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_m>/<_c>/<_a>',
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

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mail',
            'htmlLayout' => 'layouts/main-html',
            'textLayout' => 'layouts/main-text',
            'messageConfig' => [
                //  'charset' => 'cp-1251',
                'from' => ['noreply@site.com' => 'Site Name'],
            ],
            'useFileTransport' => false,
        ],
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
