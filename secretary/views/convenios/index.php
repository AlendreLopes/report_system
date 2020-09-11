<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel secretary\models\ConveniosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Convenios';
$this->params['breadcrumbs'][] = ['label' => 'Protocolos', 'url' => ['/protocolos/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="convenios-index">
    <h1>
        <?= Html::encode($this->title) ?>
        <?= Html::a('Cadastrar Conveniado', ['create'], ['class' => 'btn btn-success', 'style'=>'float:right']) ?>
    </h1>

    <?php Pjax::begin(); ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //'id',
            //'created_by',
            'titulo',
            'username',
            'email:email',
            'senha',
            //'telefone',
            'celular',
            //'cep',
            //'endereco',
            //'endereco_n',
            //'endereco_complemento',
            //'bairro',
            //'cidade',
            //'uf',
            //'data_cadastro:date',
            //'password_hash',
            //'password_reset_token',
            //'account_activation_token',
            //'auth_key',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>