<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel secretary\models\ProtocolosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Protocolos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="protocolos-index">

    <h1>
        <?= Html::encode($this->title) ?>
        <?= Html::a('Cadastrar Protocolos', ['create'], ['class' => 'btn btn-success', 'style' => 'float:right;']) ?>
    </h1>

    <?php Pjax::begin(); ?>

    <?php //echo $this->render('_search', ['model' => $searchModel]);?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //'id',
            //'user_id',
            //'convenio_id',
            //'username',
            [
                'attribute' => 'username',
                'format'    => 'raw',
                'label'     => 'Protocolos',
                'value'     => function ($model) {
                    return Html::a($model->username, Url::to(Url::to(['view', 'id' => $model->id])), ['title' => 'Visualizar Protocolos']);
                }
            ],
            'motedepass',
            'paciente',
            [
                'attribute' => 'convenio_id',
                'format'    => 'raw',
                'label'     => 'Convenio',
                'value'     => 'convenios.titulo'
            ],
            //'requisitante',
            /*
            [
                'attribute' => 'requisitante',
                'format'    => 'raw',
                'label'     => 'Veterinário',
                'value'     => 'requisitante'
            ],
            */
            //'proprietario',
            'especie',
            'especie_raca',
            //'genero',
            //'idade',
            //'contato',
            //'desconto',
            //'desconto_valor',
            //'anestesia',
            //'anestesia_valor',
            //'isento',
            //'pago',
            //'valor',
            //'cadastrado:date',
            //'expirar',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>