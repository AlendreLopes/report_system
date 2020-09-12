<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProtocolosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="protocolos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['view-search'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['placeholder' => 'Pesquisar Protocolo'])->label('') ?>
    
    <?php ActiveForm::end(); ?>

</div>
