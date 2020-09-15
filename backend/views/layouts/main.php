<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
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
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <!-- <div class="col-xs-12 col-sm-12 col-md-12"> -->
    <div class="container-fluid">
        <?php
        NavBar::begin([
            //'brandLabel' => Yii::$app->name,
            'brandLabel' => 'Página inicial',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-default',
            ],
        ]);
        // display Users to admin+ roles
        if (Yii::$app->user->can('admin')) {
            $menuItems[] = '<li>
            <form id="w0" action="/index.php/protocolos/view-search" method="get" data-pjax="1" style="padding-top:2px;">
            <div class="form-group field-protocolossearch-username">
                <input type="text" id="protocolossearch-username" class="form-control" name="ProtocolosSearch[username]" placeholder="Pesquisar Protocolo">
            </div>
            </form>
            </li>';
            $menuItems [] = [
                'label' => Yii::t('app', 'Convenios'), 'url' => ['/convenios/index'],
            ];    
            $menuItems[] = [
                'label' => Yii::t('app', 'ADM'),
                'items' => [
                    '<li class="divider"></li>',
                    '<li class="dropdown-header">Exames para Laudos</li>',
                        ['label' => Yii::t('app', 'Exames'), 'url' => ['/laudos-exames/index']],
                        ['label' => Yii::t('app', 'Exames Primario'), 'url' => ['/laudos-exames-primario/index']],
                        ['label' => Yii::t('app', 'Exames Secundario'), 'url' => ['/laudos-exames-secundario/index']],
                    '<li class="divider"></li>',
                    '<li class="dropdown-header">Laudos</li>',
                        ['label' => Yii::t('app', 'Menu'), 'url' => ['#']],
                        ['label' => Yii::t('app', 'Menu'), 'url' => ['/laudos-menu/index']],
                        ['label' => Yii::t('app', 'Primario'), 'url' => ['/laudos-menu-primario/index']],
                        ['label' => Yii::t('app', 'Secundario'), 'url' => ['/laudos-menu-secundario/index']],
                    '<li class="divider"></li>',
                    '<li class="dropdown-header">Usuários</li>',
                        ['label' => Yii::t('app', 'Users'), 'url' => ['/user/index']],
                    '<li class="divider"></li>',
                    '<li class="dropdown-header">Update DataBase</li>',
                        ['label' => Yii::t('app', 'Database'), 'url' => ['/admin/default']],
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
        <?php //= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
