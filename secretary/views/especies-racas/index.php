<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\secretaria\models\EspeciesRacasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Raças';
$this->params['breadcrumbs'][] = ['label' => 'Protocolos', 'url' => ['/secretaria/protocolos/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="especies-racas-index">

    <h1>
        <?= Html::encode($this->title) ?>
        <?= Html::a('Cadastrar Raças', ['create'], ['class' => 'btn btn-success','style'=>'float:right;']) ?>
    </h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            //'especie_id',
            [
                'attribute' => 'especie_id',
                'format'    => 'raw',
                'label'     => 'Especie',
                'value'     => function ($model) {
                    return $model->especie->titulo;
                }
            ],
            'titulo',

            ['class' => 'yii\grid\ActionColumn', 'template' => "{view} - {update}"],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>