<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\ZipCodeAsset;
/* @var $this yii\web\View */
/* @var $model app\modules\secretaria\models\Convenios */
/* @var $form yii\widgets\ActiveForm */
// Teste
// $alterado == 1 ? $config=1 :$config=0;
ZipCodeAsset::register($this);
$emailProvisional = date('hs')."_convenio@exemplo.com";
?>

<div class="convenios-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    if ($model->scenario == "create") {
        $getPassw = Yii::$app->getSecurity()->generateRandomString(8);
    ?>
        <!-- Create -->
        <div class="row">
            <div class="col-sm-3">
                <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-3">
                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-3">
                <?= $form->field($model, 'senha')->textInput([
                    'readonly' => true,
                    'maxlength' => true,
                    'value' => $getPassw,
                    'style' => 'text-align: center;text-transform: uppercase;letter-spacing: 2px;font-weight: bold;'
                ]); ?>
            </div>
            <div class="col-sm-3">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'value' => $emailProvisional]) ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($model, 'emailConfirmar')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-4">
                <!--  -->
            </div>
        </div>
    <?php
    } else if ($model->scenario == "update") {
    ?>
        <!-- Update -->
        <div class="row">
            <div class="col-sm-3">
                <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-3">
                <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('Proprietário') ?>
            </div>
            <div class="col-sm-3">
                <?= $form->field($model, 'senha')->textInput([
                    'disabled' => true,
                    'maxlength' => true,
                    'style' => 'text-align: center;text-transform: uppercase;letter-spacing: 2px;font-weight: bold;'
                ]); ?>
            </div>
            <div class="col-sm-3">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($model, 'emailConfirmar')->textInput(['maxlength' => true, 'value' => $model->email]) ?>
            </div>
            <div class="col-sm-4">
                <!--  -->
            </div>
        </div>
    <?php
    }
    ?>
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
        <?= Html::a(Yii::t('app', 'Cancel'), ['convenios/index'], ['class' => 'btn btn-default']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>