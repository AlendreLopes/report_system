<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-owners',
    'name'        => '[ Sistema de Proprietários ]',
    'language'    => 'pt_BR',
    'layout'      => 'main',
    'defaultRoute'=> 'protocolos',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'owners\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-owners',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['agreements']
        ],
        'user' => [
            'identityClass' => 'owners\models\OwnersUser',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-owners', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the owners
            'name' => 'advanced-owners',
            //'domain' => 'owners.petimagem.com.br',
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
                '<controller:[\w-]+>/<id:\d+>' => '<controller>/update',
                '<controller:[\w-]+>/<id:\d+>' => '<controller>/delete',
                '<controller:[\w-]+>/<action:[\w-]+>' => '<controller>/<action>',
                '<controller:[\w-]+>/<action:[\w-]+>/<id:\d+>' => '<controller>/<action>',
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
