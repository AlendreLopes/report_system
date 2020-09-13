<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosApCitopatologiaVaginalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laudos-ap-citopatologia-vaginal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'protocolos_id') ?>

    <?= $form->field($model, 'amostra') ?>

    <?= $form->field($model, 'codigo') ?>

    <?php // echo $form->field($model, 'epiteliais_queratinizadas') ?>

    <?php // echo $form->field($model, 'epiteliais_queratinizadas_n') ?>

    <?php // echo $form->field($model, 'eritrocitos') ?>

    <?php // echo $form->field($model, 'bacterias') ?>

    <?php // echo $form->field($model, 'leucocitos') ?>

    <?php // echo $form->field($model, 'em_branco') ?>

    <?php // echo $form->field($model, 'em_branco_') ?>

    <?php // echo $form->field($model, 'diagnostico') ?>

    <?php // echo $form->field($model, 'concluido') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
