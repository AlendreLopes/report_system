<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LaudosMenu */

$this->title = 'Update Laudos Menu: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Laudos Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="laudos-menu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
