<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosDiUsPosParto */
/* @var $form yii\widgets\ActiveForm */

$defaultText = "Útero com distensão mediana, parede espessada, mucosa regular e conteúdo hipoecogênico. Não há evidências sonográficas de fetos retidos.

Conclusão: Imagens compatíveis com fase pós-parto";
?>

<div class="laudos-di-us-pos-parto-form">

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