<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ConveniosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Convenios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convenios-index">

    <h1>
        <?= Html::encode($this->title) ?>
        <span class="pull-right">
            <?= Html::a('Cadastrar Convenios', ['create'], ['class' => 'btn btn-success']) ?>
        </span>
    </h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'titulo',
            'username',
            'email:email',
            'senha',
            //'telefone',
            'celular',
            //'cep',
            //'endereco',
            //'endereco_numero',
            //'endereco_complemento',
            //'bairro',
            //'cidade',
            //'uf',
            //'data_cadastro',
            //'created_by',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
