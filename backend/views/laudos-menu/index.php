<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\LaudosMenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laudos Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laudos-menu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Laudos Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php echo $this->render('@app/views/laudos-menu/menuLaudos'); ?>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            'titulo',
            'exibir',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
