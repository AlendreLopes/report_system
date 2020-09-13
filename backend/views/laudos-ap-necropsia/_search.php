<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LaudosApNecropsiaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laudos-ap-necropsia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'protocolo_id') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'amostra') ?>

    <?= $form->field($model, 'exame') ?>

    <?php // echo $form->field($model, 'conclusao') ?>

    <?php // echo $form->field($model, 'concluido') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
