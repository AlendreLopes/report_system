<?php
/* $baseUrl = str_replace(dirname(__DIR__), '', (new Request)->getBaseUrl()); */
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name'        => '[ Sistema de Laudos ]',
    'language'    => 'pt_BR',
    'layout'      => 'main',
    'defaultRoute'=> 'protocolos',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
            //'domain' => 'reports.petimagem.com.br',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /* 'request' => [
            'baseUrl' => $baseUrl,
        ], */
        'urlManager' => [
            //'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'rules' => [
                '<controller:[\w-]+>/<id:\d+>' => '<controller>/view',
                '<controller:[\w-]+>/<action:[\w-]+>' => '<controller>/<action>',
                '<controller:[\w-]+>/<action:[\w-]+>/<id:\d+>' => '<controller>/<action>',    
                /* '<controller:[\w-]+>/<id:\d+>' => '<controller>/update',
                '<controller:[\w-]+>/<id:\d+>' => '<controller>/delete',
                '<controller:[\w-]+>/<id:\d+>' => '<controller>/view-print',
                '<controller:[\w-]+>/<id:\d+>' => '<controller>/create-report', */
            ],
        ],
        'formatter' => [
            'class' => 'common\components\NewFormatter',
            //'cache' => 'cache',
            'dateFormat' => 'dd/MM/Y',
            'decimalSeparator' => ',',
            'thousandSeparator' => '.',
            'currencyCode' => 'pt-BR',
        ],
    ],
    'params' => $params,
];
