<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProtocolosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Laudos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="protocolos-index">

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
            [
                'attribute' => 'username',
                'format'    => 'raw',
                'label'     => 'Protocolos',
                'value'     => function ($model) {
                    return Html::a($model->username, Url::to(Url::to(['protocolos/create-report', 'id' => $model->id])), ['title' => 'Cadastrar Laudos']);
                }
            ],
            [
                'attribute' => 'convenio_id',
                'value'     => 'convenios.username',
            ],
            'requisitante',
            'paciente',
            'especie',
            'especie_raca',
            [
                'attribute' => 'username',
                'format'    => 'raw',
                'label'     => 'Imprimir',
                'value'     => function ($model) {
                    return Html::a( 
                         //$model->username
                         '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/>
                            <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                            <path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                        </svg>
                        ',
                         Url::to(Url::to(['protocolos/view-print', 'id' => $model->id])), 
                         ['title' => 'Imprimir Laudos', 'style' => ['margin-left' => '40%']]);
                }
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
