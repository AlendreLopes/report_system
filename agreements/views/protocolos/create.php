<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model agreements\models\Protocolos */

$this->title = 'Create Protocolos';
$this->params['breadcrumbs'][] = ['label' => 'Protocolos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="protocolos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
