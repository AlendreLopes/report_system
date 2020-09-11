<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosDiUsPosParto */

$this->title = 'Atualizar Laudos DI Us Pos Parto: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Laudos', 'url' => ['/protocolos/index']];
$this->params['breadcrumbs'][] = ['label' => 'Laudos DI US Pos Parto', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="laudos-di-us-pos-parto-update">

    <?php echo $this->render('@app/views/laudos-menu/menuLaudos'); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>