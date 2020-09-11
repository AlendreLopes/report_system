<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LaudosMenuPrimario */

$this->title = 'Update Laudos Menu Primario: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Laudos Menu Primarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="laudos-menu-primario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
