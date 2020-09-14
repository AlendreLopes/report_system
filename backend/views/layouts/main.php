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
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-md-5 text-center">&nbsp;</div>
        <div class="col-xs-2 col-sm-2 col-md-2">
            <div class="protocolos-search">
            <form id="w0" action="/backend/web/index.php/protocolos/view-search" method="get" data-pjax="1">
                <div class="form-group field-protocolossearch-username">
                    <label class="control-label" for="protocolossearch-username"></label>
                    <input type="text" id="protocolossearch-username" class="form-control" name="ProtocolosSearch[username]" placeholder="Pesquisar Protocolo">
                    <div class="help-block"></div>
                </div>
            </form>
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 text-right">
        <?php
            echo Html::beginForm(['/site/logout'], 'post');
            //echo Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', [ 'class' => 'btn btn-danger']);
            echo Html::submitButton('<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M12 1H4a1 1 0 0 0-1 1v10.755S4 11 8 11s5 1.755 5 1.755V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
            <path fill-rule="evenodd" d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>', [ 'class' => 'btn btn-warning', 'title' => Yii::$app->user->identity->username . ' sair do sistema?']);
            echo Html::endForm();
        ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
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
