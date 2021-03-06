<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\secretaria\models\EspeciesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Especies';
$this->params['breadcrumbs'][] = ['label' => 'Protocolos', 'url' => ['/protocolos/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="especies-index">

    <h1>
        <?= Html::encode($this->title) ?>
        <?= Html::a('Cadastrar Especies', ['create'], ['class' => 'btn btn-success','style'=>'float:right;']) ?>
    </h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //'id',
            'titulo',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} - {update} - {delete}'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>