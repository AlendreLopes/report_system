<?php
//$baseUrl = str_replace('/secretary/web', '', (new Request)->getBaseUrl());
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-secretary',
    'name'        => '[ Sistema de Protocolos ]',
    'language'    => 'pt_BR',
    'layout'      => 'main',
    'defaultRoute'=> 'protocolos',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'secretary\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-secretary',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-secretary', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the secretary
            'name' => 'advanced-secretary',
            //'domain' => 'protocols.petimagem.com.br',
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
        /*
        'request' => [
            'baseUrl' => $baseUrl,
        ],
        */
        'urlManager' => [
            //'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];
