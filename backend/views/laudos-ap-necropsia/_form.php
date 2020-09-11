<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LaudosApNecropsia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laudos-ap-necropsia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'protocolos_id')->textInput() ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amostra')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'exame')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'conclusao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'concluido')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? 'Cadastrar' : 'Atualizar',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), ['protocolos/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
