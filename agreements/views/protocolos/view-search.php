<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProtocolosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Resultado da pesquisa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="table-responsive">

    <p>
        <h3><?= Html::encode($this->title) ?></h3>
    </p>

    <?php Pjax::begin(); ?>
    
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    
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
                    return Html::a($model->username, 
                    Url::to(['protocolos/view', 'id' => $model->id]), 
                    ['title' => 'Visualizar Laudo']);
                }
            ],
            'requisitante',
            'proprietario',
            'paciente',
            'idade',
            'genero',
            'especie',
            'especie_raca',
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
