<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model agreements\models\Protocolos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="protocolos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'convenio_id')->textInput() ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'motedepass')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'account_activation_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requisitante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proprietario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paciente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'especie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'especie_raca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contato')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desconto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desconto_valor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anestesia')->dropDownList([ 'sim' => 'Sim', 'nao' => 'Nao', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'anestesia_valor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isento')->dropDownList([ 'nao' => 'Nao', 'sim' => 'Sim', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pago')->dropDownList([ 'sim' => 'Sim', 'nao' => 'Nao', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'valor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_cadastro')->textInput() ?>

    <?= $form->field($model, 'data_expira')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
