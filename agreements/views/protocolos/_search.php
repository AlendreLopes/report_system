<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model agreements\models\ProtocolosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="protocolos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'convenio_id') ?>

    <?= $form->field($model, 'numero') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'motedepass') ?>

    <?php // echo $form->field($model, 'password_hash') ?>

    <?php // echo $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'account_activation_token') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'requisitante') ?>

    <?php // echo $form->field($model, 'proprietario') ?>

    <?php // echo $form->field($model, 'paciente') ?>

    <?php // echo $form->field($model, 'especie') ?>

    <?php // echo $form->field($model, 'especie_raca') ?>

    <?php // echo $form->field($model, 'genero') ?>

    <?php // echo $form->field($model, 'idade') ?>

    <?php // echo $form->field($model, 'contato') ?>

    <?php // echo $form->field($model, 'desconto') ?>

    <?php // echo $form->field($model, 'desconto_valor') ?>

    <?php // echo $form->field($model, 'anestesia') ?>

    <?php // echo $form->field($model, 'anestesia_valor') ?>

    <?php // echo $form->field($model, 'isento') ?>

    <?php // echo $form->field($model, 'pago') ?>

    <?php // echo $form->field($model, 'valor') ?>

    <?php // echo $form->field($model, 'data_cadastro') ?>

    <?php // echo $form->field($model, 'data_expira') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
