<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model agreements\models\Protocolos */

$this->title = $model->id;
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
            'id',
            'convenio_id',
            'numero',
            'username',
            'motedepass',
            'password_hash',
            'password_reset_token',
            'account_activation_token',
            'status',
            'auth_key',
            'requisitante',
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
            'data_cadastro',
            'data_expira',
            'created_by',
        ],
    ]) ?>

</div>
