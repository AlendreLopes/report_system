<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\LaudosMenuPrimarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laudos Menu Primarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laudos-menu-primario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Laudos Menu Primario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            //'laudos_menu_id',
            'pagina',
            //'acao',
            'titulo',
            //'valor',
            //'exibir',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
