<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosApHistopatologia */

$this->title = "Laudo AP Histopatologia";
$this->params['breadcrumbs'][] = ['label' => 'Laudos AP Histopatologias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="laudos-ap-histopatologia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
        ['/protocolos/view-print', 'id' => $model->protocolos_id], 
        [
            'class' => 'btn btn-primary',
            'style' => 'float:right;'
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'created_by',
            //'protocolos_id',
            'amostra:ntext',
            'exame:ntext',
            'conclusao:ntext',
            'concluido',
        ],
    ]) ?>

</div>
