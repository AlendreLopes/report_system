<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosDiUsGestacional */

$this->title = "Laudo US Gestacional";
$this->params['breadcrumbs'][] = ['label' => 'Laudos', 'url' => ['/protocolos/index']];
$this->params['breadcrumbs'][] = ['label' => 'Laudos DI US Gestacional', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="laudos-di-us-gestacional-view">

    <?php echo $this->render('@app/views/laudos-menu/menuLaudos'); ?>

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
            'descricao:ntext',
            'concluido:date',
        ],
    ]) ?>

</div>
