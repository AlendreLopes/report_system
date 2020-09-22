<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\LaudosApNecropsia */

$this->title = "Laudo AP Necropsia";
$this->params['breadcrumbs'][] = ['label' => 'Laudos Ap Necropsias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="laudos-ap-necropsia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Imprimir', 
        ['/protocolos/view-print-reports', 'id' => $model->protocolos_id], 
        [
            'class' => 'btn btn-primary pull-right',
            'target' => '_blank'
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'protocolo_id',
            'codigo',
            'amostra:ntext',
            'exame:ntext',
            'conclusao:ntext',
            'concluido',
            'created_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
