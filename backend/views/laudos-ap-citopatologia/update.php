<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosApCitopatologia */

$this->title = 'Update Laudos Ap Citopatologia: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Laudos Ap Citopatologias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="laudos-ap-citopatologia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
