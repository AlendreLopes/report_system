<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model agreements\models\Convenios */

$this->title = 'Atualizar E-mail e Senha: ' . $model->titulo;
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizando';
?>
<div class="container-fluid">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_pass', [
        'model' => $model,
    ]) ?>

</div>
