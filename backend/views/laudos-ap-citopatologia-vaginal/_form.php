<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosApCitopatologiaVaginal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laudos-ap-citopatologia-vaginal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'protocolos_id')->textInput() ?>

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

    <?= $form->field($model, 'concluido')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
