<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosDiUsObstetrica */
/* @var $form yii\widgets\ActiveForm */

$defaultText = "BIOMETRIA FETAL:
Diâmetro biparietal (crânio)   =  cm.
Diâmetro torácico              =  cm.
Diâmetro abdominal             =  cm.

Batimentos cardíacos presentes e rítmicos – aproximadamente  bat/min.

Placenta com aspecto homogêneo e espessura dentro da normalidade. Líquido amniótico com aparência e volume adequado para a fase.

Sistema ósseo articular em desenvolvimento, produzindo tênue sombra acústica posterior. No abdômen fetal é possível a individualização de: estômago, rins, fígado, bexiga e alças intestinais.

Apesar da pouca precisão do método na quantificação fetal, estimam-se a presença de fetos, com bom desenvolvimento, movimentação e dimensões semelhantes com sinais sonográficos compatíveis com gestação de aproximadamente a dias.
";
?>

<div class="laudos-di-us-obstetrica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'protocolos_id')->hiddenInput(['value' => $protocoloId])->label(false) ?>

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