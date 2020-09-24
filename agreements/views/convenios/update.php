<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model agreements\models\Convenios */

$this->title = 'Atualizar dados';
$this->params['breadcrumbs'][] = ['label' => $model->titulo, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizando';
?>
<div class="contanier-fluid">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
