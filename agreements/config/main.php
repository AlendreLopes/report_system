<?php
//$baseUrl = str_replace('/site/web', '', (new Request)->getBaseUrl());
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-agreements',
    'name'        => '[ Sistema de Conveniados ]',
    'language'    => 'pt_BR',
    'layout'      => 'main',
    //'defaultRoute'=> 'agreements',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'agreements\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-agreements',
        ],
        'user' => [
            'identityClass' => 'agreements\models\AgreementsUser',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-agreements', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the agreements
            'name' => 'advanced-agreements',
            //'domain' => 'agreements.petimagem.com.br',
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
        /*'request' => [
            'baseUrl' => $baseUrl,
        ],*/
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
