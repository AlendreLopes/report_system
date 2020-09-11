<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LaudosMenuPrimario */

$this->title = 'Create Laudos Menu Primario';
$this->params['breadcrumbs'][] = ['label' => 'Laudos Menu Primarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laudos-menu-primario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
