<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model agreements\models\Convenios */
/* @var $form yii\widgets\ActiveForm */
use agreements\assets\ZipCodeAsset;
/* @var $this yii\web\View */
ZipCodeAsset::register($this);
?>

<div class="container-fluid">

    <?php $form = ActiveForm::begin([
        'id' => $model->formName(),
        'enableAjaxValidation' => true,
    ]); ?>
        <div class="row">
            <div class="col-sm-3">
                <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-3">
                <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('Proprietário') ?>
            </div>
            <div class="col-sm-3"><!--  --></div>
            <div class="col-sm-3"><!--  --></div>
        </div>
    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'telefone')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '99 9999-9999',
                'clientOptions' => [
                    'maxlength' => true,
                    'placeholder' => '00 0000-0000'
                ]
            ]) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'telefoneConfirmar')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '99 9999-9999',
                'clientOptions' => [
                    'maxlength' => true,
                    'placeholder' => '00 0000-0000'
                ]
            ]) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'celular')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '99 9999-9999',
                'clientOptions' => [
                    'maxlength' => true,
                    'placeholder' => '00 0000-0000'
                ]
            ]) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'celularConfirmar')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '99 9999-9999',
                'clientOptions' => [
                    'maxlength' => true,
                    'placeholder' => '00 0000-0000'
                ]
            ]) ?>
        </div>
    </div>
    <!-- Endereço -->
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'cep')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '99.999-999',
                'clientOptions' => [
                    'maxlength' => true,
                    'placeholder' => '00.000-000'
                ]
            ]) ?>
        </div>
        <div class="col-sm-4">
            <!-- colunas -->
        </div>
        <div class="col-sm-4">
            <!-- colunas -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'endereco_numero')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'endereco_complemento')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'bairro')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'cidade')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'uf')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row"></div>
    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? Yii::t('app', 'Cadastrar') : Yii::t('app', 'Atualizar'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
        <?= Html::a(Yii::t('app', 'Cancelar'),['convenios/view', 'id' => Yii::$app->user->id], ['class' => 'btn btn-default']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>