<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosDiUsGestacional */
/* @var $form yii\widgets\ActiveForm */

$defaultText = "Presença de vesícula gestacional com aparência e ecogenicidade dentro da normalidade.

Presença de estrutura embrionária com visualização de atividade cardíaca.

Diâmetro da vesícula gestacional:  cm

Tempo de gestação sugerido:  dias
 
Número de vesículas gestacionais:";
?>

<div class="laudos-di-us-gestacional-form">

    <?= $form->field($model, 'protocolos_id')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 10, 'value' => $defaultText]) ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? 'Cadastrar' : 'Atualizar',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), ['protocolos/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>