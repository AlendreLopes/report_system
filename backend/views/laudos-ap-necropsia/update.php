<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LaudosApNecropsia */

$this->title = 'Update Laudos Ap Necropsia: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Laudos Ap Necropsias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="laudos-ap-necropsia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
