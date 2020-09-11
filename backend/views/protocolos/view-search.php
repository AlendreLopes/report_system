<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\laudos\models\ProtocolosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Imprimir Protocolos';
$this->params['breadcrumbs'][] = ['label' => 'Laudos', 'url' => ['/protocolos/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="protocolos-index">

    <?php echo $this->render('@app/views/laudos-menu/menuLaudos'); ?>

    <?php Pjax::begin(); ?>
    <?= $this->render('_search', ['model' => $searchModel]); ?>
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
                    return Html::a($model->username, Url::to(Url::to(['protocolos/view-print', 'id' => $model->id])), ['title' => 'Imprimir Laudos']);
                }
            ],
            [
                'attribute' => 'convenio_id',
                'format'    => 'raw',
                'label'     => 'Convenio',
                'value'     => function ($model) {
                    return $model->convenios->titulo;
                }
            ],
            [
                'attribute' => 'requisitante',
                'format'    => 'raw',
                'label'     => 'Veterinário',
                'value'     => 'requisitante'
            ],
            'proprietario',
            'paciente',
            'especie',
            'especie_raca',
            //['class' => 'yii\grid\ActionColumn',],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    </div>