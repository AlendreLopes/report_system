<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosApCitopatologiaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laudos-ap-citopatologia-search">

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

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'amostra') ?>

    <?php // echo $form->field($model, 'exame') ?>

    <?php // echo $form->field($model, 'conclusao') ?>

    <?php // echo $form->field($model, 'concluido') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
