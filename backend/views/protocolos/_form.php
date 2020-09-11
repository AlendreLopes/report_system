<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use yii\data\Sort;

use backend\models\Convenios;
use backend\models\Especies;
use backend\models\EspeciesRacas;
use backend\models\Protocolos;

use kartik\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use kartik\password\PasswordInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Protocolos */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="protocolos-form">
<div class="panel panel-default">
      <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
        	<div class="col-sm-3">
	        	<?= $form->field($model, 'username')->textInput([
					'maxlength' => true, 
					'value' => $setNewProtocolo, 
					'style' => 'text-align: center;font-weight: bold;']); ?>
        	</div>
			<div class="col-sm-3">
				<?= $form->field($model, 'motedepass')->textInput([
					'maxlength' => true, 
					'value' => $setMoteDePass, 
					'style' => 'text-align: center;text-transform: uppercase;letter-spacing: 2px;font-weight: bold;']); ?>
			</div>
			<div class="col-sm-3">
				<?php //= $form->field($model, 'data_cadastro')->textInput(['value' => Yii::$app->formatter->asDate(date("Y-m-d"), "d/MM/Y")]) ?>
				Data de Cadastro:
				<?= Yii::$app->formatter->asDate(date("Y-m-d"), "d/MM/Y"); ?>
			</div>
			<div class="col-sm-3">
				<?php //= $form->field($model, 'data_expira')->textInput(['value' => Yii::$app->formatter->asDate(date("Y-m-d",strtotime("+ 60 days")), "d/MM/Y")]) ?>
				Data que Expira acesso:
				<?= Yii::$app->formatter->asDate(date("Y-m-d",strtotime("+ 60 days")), "d/MM/Y"); ?>
			</div>
        </div>
        <div class="row">
        	<div class="col-sm-4">
				<?= $form->field($model, 'paciente')->textInput(['maxlength' => true]) ?>
        	</div>
        	<div class="col-sm-4">
            	<?= $form->field($model, 'genero')->widget(Select2::className(),[
            	    'data' => [
            	        'Macho' => 'Macho',
            	        'Femea' => 'Femea',
            	    ],
		            'options' => ['placeholder' => 'Selecione o Sexo'],
		            'pluginOptions' => [
		                'allowClear' => true
		            ]]) ?>
        	</div>
        	<div class="col-sm-4">
            	<?= $form->field($model, 'idade')->textInput(['maxlength' => true]) ?>
        	</div>
		</div>
		<div class="row">
        	<div class="col-sm-4">
	        	<?= $form->field($model, 'especie')->widget(Select2::className(),[
	        	    'data'    => ArrayHelper::map(Especies::find()->all(), 'titulo','titulo'),
	        	    'options' => ['placeholder'=> 'Selecione uma Espécie'],
	        	    'pluginOptions' => ['allowClear'=> true]]) ?>
        	</div>
        	<div class="col-sm-4">
        		<?= $form->field($model, 'especie_raca')->widget(Select2::className(),[
	        	    'data'    => ArrayHelper::map(EspeciesRacas::find()->all(), 'titulo','titulo'),
	        	    'options' => ['placeholder'=> 'Selecione uma Raça'],
	        	    'pluginOptions' => [ 'allowClear'=> true]]) ?>
        	</div>
			<div class="col-sm-4">
				<?= $form->field($model, 'numero')->hiddenInput(['maxlength' => true, 'value' => $setNewNumber])->label(false); ?>
			</div>
		</div>
        <div class="row">
        	<div class="col-sm-4">
		        <?= $form->field($model, 'convenio_id')->widget(Select2::className(),[
		            'data' => ArrayHelper::map(Convenios::find()->all(), 'id','titulo'),
		            'options' => ['placeholder' => 'Selecione o Convênio'],
		            'pluginOptions' => ['allowClear' => true]]) ?>
        	</div>
        	<div class="col-sm-4">
    	        <?= $form->field($model, 'requisitante')->textInput(['maxlength' => true]) ?>
        	</div>
		</div>		
        <div class="row">
        	<div class="col-sm-4">
	        	<?= $form->field($model, 'proprietario')->textInput(['maxlength' => true]) ?>
        	</div>
        	<div class="col-sm-4">
	        	<?= $form->field($model, 'contato')->widget(\yii\widgets\MaskedInput::className(), [
	        	    'mask' => '99 99999-9999',
	        	    'clientOptions' => [
	        	        'maxlength' => true,
	        	        'placeholder' => '00 00000-0000']]) ?>
        	</div>
        	<div class="col-sm-4">
	        	<?= $form->field($model, 'contatoConfirmar')->widget(\yii\widgets\MaskedInput::className(), [
	        	    'mask' => '99 99999-9999',
	        	    'clientOptions' => [
	        	        'maxlength' => true,
	        	        'placeholder' => '00 00000-0000']]) ?>
        	</div>
		</div>
        <div class="row"></div>
        <div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Cadastrar') : Yii::t('app', 'Update'), 
			['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Cancel'), ['protocolos/index'], ['class' => 'btn btn-default']) ?>
        </div>
        <?php ActiveForm::end(); ?>
      </div>
    </div>
</div>
