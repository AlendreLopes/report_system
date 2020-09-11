<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosApHistopatologia */

$this->title = 'Update Laudos Ap Histopatologia: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Laudos Ap Histopatologias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="laudos-ap-histopatologia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
