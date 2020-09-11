<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LaudosMenu */

$this->title = 'Create Laudos Menu';
$this->params['breadcrumbs'][] = ['label' => 'Laudos Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laudos-menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
