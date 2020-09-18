<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel agreements\models\ConveniosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Convenios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convenios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Convenios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'email:email',
            'senha',
            'password_hash',
            'password_reset_token',
            //'account_activation_token',
            //'status',
            //'auth_key',
            //'titulo',
            //'username',
            //'telefone',
            //'celular',
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
