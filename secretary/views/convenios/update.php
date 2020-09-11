<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model secretary\models\Convenios */

$this->title = 'Atualizar Convenio: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Protocolos', 'url' => ['/protocolos/index']];
$this->params['breadcrumbs'][] = ['label' => 'Convenios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Convenio: '.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>

<div class="convenios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>