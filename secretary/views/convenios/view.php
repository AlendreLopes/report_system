<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model secretary\models\Convenios */

$this->title = "Coneniado: ".$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Protocolos', 'url' => ['/protocolos/index']];
$this->params['breadcrumbs'][] = ['label' => 'Convenios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="convenios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'created_by',
            'titulo',
            'username',
            'email:email',
            'telefone',
            'celular',
            'senha',
            'cep',
            'endereco',
            'endereco_numero',
            'endereco_complemento',
            'bairro',
            'cidade',
            'uf',
            //'data_cadastro:date',
            [
                'attribute' => 'data_cadastro',
                'label' => 'Cadastrada',
                'value' => 'data_cadastro',
            ]
        ],
    ]) ?>

</div>