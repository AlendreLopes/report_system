<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProtocolosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Protocolos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="protocolos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('@app/views/laudos-menu/menuLaudos'); ?>

    <?php Pjax::begin(); ?>
    <?= $this->render('_search', ['model' => $searchModel]); 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'table-responsive table table-striped',
        ],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            //'id',
            //'username',
            [
                'attribute' => 'username',
                'format'    => 'raw',
                'label'     => 'Protocolos',
                'value'     => function ($model) {
                    return Html::a($model->username, Url::to(Url::to(['protocolos/create-report', 'id' => $model->id])), ['title' => 'Cadastrar Laudos']);
                }
            ],
            //'convenio_id',
            [
                'attribute' => 'convenio_id',
                'value'     => 'convenios.username',
            ],
            'requisitante',
            //'proprietario',
            'paciente',
            'especie',
            'especie_raca',
            [
                'attribute' => 'username',
                'format'    => 'raw',
                'label'     => 'Imprimir',
                'value'     => function ($model) {
                    return Html::a($model->username, Url::to(Url::to(['protocolos/view-print', 'id' => $model->id])), ['title' => 'Imprimir Laudos']);
                }
            ],
            //'genero',
            //'data_cadastro:date',
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
