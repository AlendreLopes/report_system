<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosDiUsAparelhoFeminino */
/* @var $form yii\widgets\ActiveForm */

$defaultText = "Bexiga urinária de repleção adequada, paredes normoespessas e ecogênicas, mucosa regular e conteúdo anecogênico dentro dos padrões da normalidade.
Útero sem evidências de distensão, paredes normoespessas e ecogênicas com conteúdo ecogênico dentro da normalidade.
Ovário direito em topografia habitual, tamanho preservado (   cm)  com morfologia, contornos e textura normais.
Ovário esquerdo em topografia habitual, tamanho preservado (   cm)  com morfologia, contornos e textura normais.";
?>

<div class="laudos-di-us-aparelho-feminino-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'protocolos_id')->hiddenInput(['value' => $protocoloId])->label(false) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6, 'value' => $defaultText]) ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? 'Cadastrar' : 'Atualizar',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), ['protocolos/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>