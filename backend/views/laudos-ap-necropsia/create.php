<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LaudosApNecropsia */

$this->title = 'Create Laudos Ap Necropsia';
$this->params['breadcrumbs'][] = ['label' => 'Laudos Ap Necropsias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laudos-ap-necropsia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
