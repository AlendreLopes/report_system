<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LaudosApCitopatologia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laudos-ap-citopatologia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'protocolos_id')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'amostra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'exame')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'conclusao')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? 'Cadastrar' : 'Atualizar',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
        <?= Html::a('Imprimir', 
        ['/protocolos/view-print-reports', 'id' => $model->protocolos_id], 
        [
            'class' => 'btn btn-primary pull-right',
            'target' => '_blank'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
