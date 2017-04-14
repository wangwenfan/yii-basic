<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'admin/', //默认路由
    'controller' => 'index', //默认控制器
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
        'home' => [
            'class' => 'app\modules\home\Module',
        ],
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'imageAllowExtensions'=>['jpg','png','gif']
        ],
    ],
    'components' => [
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
        'assetManager' => [
            'appendTimestamp' => true, //assets依赖时间戳参数作版本号
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'lc0ssxNrn6EvweNOBY6ECHPkBxRakiAl',
            'enableCsrfValidation' => false, //关闭csrf验证
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true, //是否启用美化
            'enableStrictParsing' => false, //是否启用严格解析
            'showScriptName' => false,//是否保留index.php
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'news'=>'home/user',
                    ],
                    'pluralize' => false, //取消复数
                ],
            ],
            'suffix' => '.html',//url后缀
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
            'db' => 'db',  // 数据库连接的应用组件ID
            'sessionTable' => 'sw_session', // session 数据表名，默认为'session'.
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
        'allowedIPs' => ['10.10.12.232', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '127.0.0.1'],
    ];
}

return $config;
