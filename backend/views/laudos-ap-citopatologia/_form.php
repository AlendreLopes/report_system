<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosApCitopatologia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laudos-ap-citopatologia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'created_by')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'protocolos_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'amostra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'exame')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'conclusao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'concluido')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
