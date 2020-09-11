<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Protocolos */

$this->title = "Protocolo: ".$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Protocolos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="protocolos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'username',
            //'motedepass',
            [
                'attribute' => 'motedepass',
                'label'     => 'Senha',
                'value'     => $model->motedepass,
            ],
            //'convenios.username',
            [
                'attribute' => 'convneios_id',
                'label'     => 'Convenio',
                'value'     => $model->convenios->username,
            ],
            'requisitante',
            //'numero',
            'proprietario',
            'paciente',
            'especie',
            'especie_raca',
            'genero',
            'idade',
            'contato',
            'desconto',
            'desconto_valor',
            'anestesia',
            'anestesia_valor',
            'isento',
            'pago',
            'valor',
            'data_cadastro:date',
            'data_expira:date',
            //'created_by',
        ],
    ]) ?>

</div>
