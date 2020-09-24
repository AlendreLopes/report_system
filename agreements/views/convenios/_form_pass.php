<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model agreements\models\Convenios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="convenios-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-sm-3">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-3">
                <?= $form->field($model, 'emailConfirmar')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-3">
                <?= $form->field($model, 'senha')->textInput([
                    'maxlength' => true,
                    'style' => 'text-align: center;text-transform: uppercase;letter-spacing: 2px;font-weight: bold;'
                ]); ?>
            </div>
            <div class="col-sm-3">
                <?= $form->field($model, 'senhaConfirmar')->textInput([
                    'maxlength' => true,
                    'style' => 'text-align: center;text-transform: uppercase;letter-spacing: 2px;font-weight: bold;'
                ]) ?>
            </div>
        </div>
        <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? Yii::t('app', 'Cadastrar') : Yii::t('app', 'Atualizar'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
        <?= Html::a(Yii::t('app', 'Cancelar'), ['/protocolos/index'], ['class' => 'btn btn-default']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
