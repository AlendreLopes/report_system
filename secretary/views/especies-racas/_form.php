<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\modules\secretaria\models\Especies;

use kartik\widgets\ActiveForm;
//use kartik\widgets\DepDrop;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\secretaria\models\EspeciesRacas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="especies-racas-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'especie_id')->widget(Select2::className(), [
                'data'    => ArrayHelper::map(Especies::find()->all(), 'id', 'titulo'),
                'options' => ['placeholder' => 'Selecione uma Espécie'],
                'pluginOptions' => ['allowClear' => true]
            ]) ?>

        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? Yii::t('app', 'Cadastrar') : Yii::t('app', 'Atualizar'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), ['especies-racas/index'], ['class' => 'btn btn-default']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>