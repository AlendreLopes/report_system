<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use secretary\assets\AppAsset;
use secretary\assets\PrintProtocolsPdfAsset;
use common\widgets\Alert;

AppAsset::register($this);
PrintProtocolsPdfAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <!-- <style>@page { size: A4 }</style> -->
    <style>@page { size: A4 }</style>
    <link type="text/css" rel="stylesheet" media="print" src="@app/web/print_protocols.css" />
</head>
<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
    ];
    if (Yii::$app->user->can('secretary')) {
        // everyone can see Home page
        $menuItems[] = ['label' => Yii::t('app', 'Convênios'), 'url' => ['/convenios/index']];
        $menuItems[] = [
            'label' => Yii::t('app', 'Menu'),
            'items' => [
                '<li class="divider"></li>',
                '<li class="dropdown-header">Espécies</li>',
                ['label' => Yii::t('app', 'Especies'), 'url' => ['/especies/index']],
                ['label' => Yii::t('app', 'Raças'), 'url' => ['/especies-racas/index']],
                '<li class="divider"></li>',
                '<li class="dropdown-header">Exames para Laudos</li>',
                ['label' => Yii::t('app', 'Exames'), 'url' => ['/protocolos-laudos-solicitados/index']],
                '<li class="divider"></li>',
            ],
        ];
    }
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<!-- 
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?php //= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?php //= Yii::powered() ?></p>
    </div>
</footer>
 -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
