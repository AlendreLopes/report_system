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
<div class="table-responsive">

    <?php echo $this->render('@app/views/laudos-menu/menuLaudos'); ?>
    <hr>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'options' => [
            'class' => 'table table-striped',
        ],
        'columns' => [
            [
                'attribute' => 'username',
                'format'    => 'raw',
                'label'     => 'Protocolos',
                'value'     => function ($model) {
                    return Html::a($model->username, Url::to(['protocolos/create-report', 'id' => $model->id]), ['title' => 'Cadastrar Laudos']);
                }
            ],
            [
                'attribute' => 'convenio_id',
                'value'     => 'convenios.titulo',
            ],
            'requisitante',
            'paciente',
            'especie',
            'especie_raca',
            //'password_hash',
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
