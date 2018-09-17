<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'debug'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'LAJlWObBLUjRftkVen3-5dfjlRNegcrz',
            'enableCsrfValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
            'enableSession' => true,

        ],
        'errorHandler' => [
            'errorAction' => 'yii\web\ErrorAction',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'genre',
                    'pluralize' => false,
                    'patterns' => [
                        'GET,HEAD' => 'index',
                        '<id>' => 'options',
                        '' => 'options',
                    ],
                ],
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'programm',
                    'pluralize' => false,
                    'patterns' => [
                        'GET,HEAD' => 'index',
                        '<id>' => 'options',
                        '' => 'options',
                    ],
                ],
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'channel',
                    'pluralize' => false,
                    'patterns' => [
                        'GET,HEAD' => 'index',
                        '<id>' => 'options',
                        '' => 'options',
                    ],
                ],
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'channelprogramm',
                    'pluralize' => false,
                    'patterns' => [
                        'GET,HEAD' => 'index',
                        '<id>' => 'options',
                        '' => 'options',
                    ],
                ],
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'channelcategory',
                    'pluralize' => false,
                    'patterns' => [
                        'GET,HEAD' => 'index',
                        '<id>' => 'options',
                        '' => 'options',
                    ],
                ],
                ['class' => 'yii\rest\UrlRule',
                    'controller' => 'channelpackage',
                    'pluralize' => false,
                    'patterns' => [
                        'GET,HEAD' => 'index',
                        '<id>' => 'options',
                        '' => 'options',
                    ],
                ],
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
        'allowedIPs' => ['172.18.0.1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
        'allowedIPs' => ['172.18.0.1'],
    ];
}

return $config;
