<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosDiUsObstetrica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laudos-di-us-obstetrica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'protocolos_id')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? 'Cadastrar' : 'Atualizar',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), ['protocolos/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>