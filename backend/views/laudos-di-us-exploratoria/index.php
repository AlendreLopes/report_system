<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\laudos\models\LaudosDiUsExploratoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laudos Di Us Exploratorias';
$this->params['breadcrumbs'][] = ['label' => 'Laudos', 'url' => ['/protocolos/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="laudos-di-us-exploratoria-index">

    <?php echo $this->render('@app/views/laudos-menu/menuLaudos'); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'table-responsive table table-striped',
        ],
        'columns' => [
            //'id',
            //'created_by',
            //'protocolos_id',
            [
                'attribute' => 'protocolos_id',
                'format'    => 'raw',
                'label'     => 'Protocolos',
                'value'     => function ($model) {
                    return Html::a(
                        $model->protocolos->username,
                        Url::to(Url::to(['laudos-di-us-exploratoria/view', 'id' => $model->id])),
                        ['title' => 'Vizualizar Laudo']
                    );
                }
            ],
            [
                'attribute' => 'convenio_id',
                'format'    => 'raw',
                'label'     => 'Convenios',
                'value'     => function ($model) {
                    return $model->protocolos->convenios->titulo;
                }
            ],
            [
                'attribute' => 'paciente',
                'format'    => 'raw',
                'label'     => 'Paciente',
                'value'     => function ($model) {
                    return $model->protocolos->paciente;
                }
            ],
            [
                'attribute' => 'especie',
                'format'    => 'raw',
                'label'     => 'Espécie',
                'value'     => function ($model) {
                    return $model->protocolos->especie;
                }
            ],
            [
                'attribute' => 'especie_raca',
                'format'    => 'raw',
                'label'     => 'Raça',
                'value'     => function ($model) {
                    return $model->protocolos->especie_raca;
                }
            ],
            //'descricao:ntext',
            'concluido:date',
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
