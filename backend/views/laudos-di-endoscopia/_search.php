<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosDiEndoscopiaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laudos-di-endoscopia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created_by') ?>

    <?= $form->field($model, 'protocolos_id') ?>

    <?= $form->field($model, 'local') ?>

    <?= $form->field($model, 'comentario') ?>

    <?php // echo $form->field($model, 'interpretacao') ?>

    <?php // echo $form->field($model, 'conclusao') ?>

    <?php // echo $form->field($model, 'concluido') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
