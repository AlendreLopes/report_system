<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use secretary\models\Convenios;

//$getConvenio = Convenios::findOne($model->convenio_id);
/* @var $this yii\web\View */
/* @var $model secretary\models\Protocolos */

$this->title = "Procoloto: " . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Protocolos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="protocolos-view">

    <h1>
        <div class="row">
            <div class="col-sm-8">
                <?= Html::encode($this->title) ?>
            </div>
            <div class="col-sm-2 text-right">
                <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="col-sm-2 text-right">
                <?= Html::a('Imprimir', ['view-print', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'numero',
            'username',
            'motedepass',
            //'convenio_id',
            [
                'attribute' => 'convenio_id',
                'format'    => 'raw',
                'label'     => 'Convenio',
                'value'     => function($model){
                    return $model->convenios->titulo;
                },
            ],
            'requisitante',
            'proprietario',
            'paciente',
            'especie',
            'especie_raca',
            'genero',
            'idade',
            //'contato',
            //'desconto',
            //'desconto_valor',
            //'anestesia',
            //'anestesia_valor',
            //'isento',
            //'pago',
            //'valor',
            'data_cadastro:date',
            'data_expira:date',
        ],
    ]) ?>

</div>