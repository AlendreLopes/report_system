<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosApCitopatologiaVaginal */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Laudos Ap Citopatologia Vaginals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="laudos-ap-citopatologia-vaginal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'protocolos_id',
            'amostra',
            'codigo',
            'epiteliais_queratinizadas',
            'epiteliais_queratinizadas_n',
            'eritrocitos',
            'bacterias',
            'leucocitos',
            'em_branco',
            'em_branco_',
            'diagnostico:ntext',
            'concluido',
        ],
    ]) ?>

</div>
