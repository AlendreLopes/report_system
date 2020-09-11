<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosDiUsExploratoria */
/* @var $form yii\widgets\ActiveForm */

$defaulText = "Fígado em topografia habitual, dimensões dentro da normalidade, contornos regulares, bordas finas, parênquima homogêneo e ecogenicidade mantida. Arquitetura vascular com calibre e trajeto preservados. Vesícula biliar repleta por conteúdo anecogênico, com paredes normoespessas.
Baço em topografia habitual, dimensões, contornos, padrão e ecogenicidade dentro da normalidade.
Estômago de parede preservada ( cm), com estratificação parietal mantida (nas regiões passíveis de visibilização), lúmen com conteúdo gasoso em moderada quantidade. Alças intestinais de distribuição topográfica habitual, paredes normoespessas ( cm), peristaltismo progressivo, estratificação parietal mantida e lúmen sem alterações dignas de nota.
Rim direito de tamanho próximo a normalidade ( cm), em topografia habitual, contornos regulares, arquitetura e ecogenicidade normais com limite e relação corticomedular preservados. Pelve e ureteres sem alterações.
Rim esquerdo de tamanho próximo a normalidade ( cm), em topografia habitual, contornos regulares, arquitetura e ecogenicidade normais com limite e relação corticomedular preservados. Pelve e ureteres sem alterações.
Pâncreas visibilizado em todos os contornos (corpo, lobo direito e esquerdo), ecogênico, de dimensões preservadas. Duodeno de parede normoespessa ( cm) e lúmen sem alterações dignas de nota.
Adrenais em topografia habitual, apresentando contornos regulares, ecotextura homogênea, de tamanho preservado (AD: cm; AE: cm). 
Ausência de linfonodomegalias e líquido livre abdominal.
Bexiga urinária em topografia habitual, repleção adequada, paredes normoespessas ( cm) e ecogênicas, mucosa regular e conteúdo anecogênico homogêneo.
Próstata em topografia habitual, tamanho dentro da normalidade ( cm), contornos definidos, margens regulares, padrão homogêneo e ecogenicidade preservada.
Testículo direito em bolsa escrotal de tamanho dentro da normalidade ( cm), contornos definidos, margens regulares, padrão homogêneo e ecogenicidade preservada.
Testículo esquerdo em bolsa escrotal de tamanho dentro da normalidade ( cm), contornos definidos, margens regulares, padrão homogêneo e ecogenicidade preservada.
Ovários e útero não individualizados (paciente ovariossalpingohisterectomizada - OSH).";
?>

<div class="laudos-di-us-exploratoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'protocolos_id')->hiddenInput(['value' => $protocoloId])->label(false) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 22, 'value' => $defaulText]) ?>

    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? 'Cadastrar' : 'Atualizar',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), ['protocolos/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>