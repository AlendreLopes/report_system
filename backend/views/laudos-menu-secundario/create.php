<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LaudosMenuSecundario */

$this->title = 'Create Laudos Menu Secundario';
$this->params['breadcrumbs'][] = ['label' => 'Laudos Menu Secundarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laudos-menu-secundario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
