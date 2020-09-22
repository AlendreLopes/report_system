<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosDiUsObstetrica */

$this->title = "Laudo US Obstétria";
$this->params['breadcrumbs'][] = ['label' => 'Laudos', 'url' => ['/protocolos/index']];
$this->params['breadcrumbs'][] = ['label' => 'Laudos DI US Obstetrica', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="laudos-di-us-obstetrica-view">

    <?php echo $this->render('@app/views/laudos-menu/menuLaudos'); ?>

    <p>
        <?= Html::encode($this->title) ?>
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
            //'created_by',
            //'protocolos_id',
            'descricao:ntext',
            'concluido:date',
        ],
    ]) ?>

</div>