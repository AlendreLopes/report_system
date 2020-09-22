<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosDiUsEstrutura */

$this->title = "Protocolo: ".$model->protocolos->username;
$this->params['breadcrumbs'][] = ['label' => 'Laudos', 'url' => ['/laudos/protocolos/index']];
$this->params['breadcrumbs'][] = ['label' => 'Laudos Di Us Estruturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="laudos-di-us-estrutura-view">

    <?php echo $this->render('@app/modules/laudos/views/laudos-menu/menuLaudos'); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
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
            //'id',
            //'user_id',
            //'protocolos_id',
            'local',
            'descricao:ntext',
            'concluido:date',
        ],
    ]) ?>

</div>
