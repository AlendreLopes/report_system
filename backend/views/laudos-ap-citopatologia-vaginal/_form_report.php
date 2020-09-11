<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosApCitopatologia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laudos-ap-citopatologia-vaginal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'protocolos_id')->hiddenInput(['value' => $protocoloId])->label(false) ?>

    <?= $form->field($model, 'amostra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epiteliais_queratinizadas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epiteliais_queratinizadas_n')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eritrocitos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bacterias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leucocitos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'em_branco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'em_branco_')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diagnostico')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? 'Cadastrar' : 'Atualizar',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), ['protocolos/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
