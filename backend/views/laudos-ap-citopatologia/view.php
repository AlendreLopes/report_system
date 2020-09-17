<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosApCitopatologia */

/* $this->title = "Protocolo: ".$model->protocolos->username;
$this->params['breadcrumbs'][] = ['label' => 'Laudos Ap Citopatologias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title; */
\yii\web\YiiAsset::register($this);
?>
<div class="laudos-ap-citopatologia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Imprimir', 
        ['/index.php/protocolos/view-print', 'id' => $model->protocolos_id], 
        [
            'class' => 'btn btn-primary',
            'style' => 'float:right;'
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'protocolos_id',
            'codigo',
            'amostra:ntext',
            'exame:ntext',
            'conclusao:ntext',
            'concluido',
        ],
    ]) ?>

</div>
