<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;
//use yii\widgets\ActiveForm;
use yii\data\Sort;

use secretary\models\Convenios;
use secretary\models\Especies;
use secretary\models\EspeciesRacas;

use kartik\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
//use kartik\password\PasswordInput;

/* @var $this yii\web\View */
/* @var $model secretary\models\Protocolos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="protocolos-form">
	<div class="panel panel-default">
		<div class="panel-body">
			<?php $form = ActiveForm::begin(); ?>
			<div class="row">
				<?php
				if ($model->scenario == "create") {
					$session = Yii::$app->session;
				?>
					<?php //= $form->field($model, 'numero')->textInput(['maxlength' => true, 'value' => $session['novo_protocolo']['numero']])->label(false); ?>
					<div class="col-sm-3">
						<?= $form->field($model, 'username')->textInput([
							'readonly' => true,
							'maxlength' => true, 'value' => $session['novo_protocolo']['protocolo'],
							'style' => 'text-align: center;font-weight: bold;'
						])->label('Protocolo'); ?>
					</div>
					<div class="col-sm-3">
						<?= $form->field($model, 'motedepass')->textInput([
							'readonly' => true,
							'maxlength' => true,
							'value' => $session['novo_protocolo']['motedepass'],
							'style' => 'text-align: center;text-transform: uppercase;letter-spacing: 2px;font-weight: bold;'
						]); ?>
					</div>
					<div class="col-sm-3">
						<label for="data_cadastroView">Data de Cadastro:</label>
						<br>
						<input class="form-control" type="text" name="data_cadastroView" 
							id="data_cadastroView"
							style = 'text-align: center;text-transform: uppercase;letter-spacing: 2px;font-weight: bold;'
							readonly
						 	value="<?= Yii::$app->formatter->asDate(date("Y-m-d"), "d/MM/Y"); ?>">
					</div>
					<div class="col-sm-3">
						<label for="data_expiraView">Data em que Expira acesso:</label>
						<input class="form-control" type="text" name="data_expiraView" 
							id="data_expiraView" 
							style = 'text-align: center;text-transform: uppercase;letter-spacing: 2px;font-weight: bold;'
							readonly
							value="<?= Yii::$app->formatter->asDate(date("Y-m-d",strtotime("+ 6 months")), "d/MM/Y"); ?>">
					</div>
				<?php
				} else if ($model->scenario == "update") {
				?>
					<div class="col-sm-3">
						<?= $form->field($model, 'username')->textInput([
							'readonly' => true,
							'maxlength' => true,
							'style' => 'text-align: center;font-weight: bold;'
						])->label('Protocolo'); ?>
					</div>
					<div class="col-sm-3">
						<?= $form->field($model, 'motedepass')->textInput([
							'readonly' => true,
							'maxlength' => true,
							'style' => 'text-align: center;text-transform: uppercase;letter-spacing: 2px;font-weight: bold;'
						]); ?>
					</div>
					<div class="col-sm-3">
						<label for="data_cadastroView">Data de Cadastro:</label>
						<br>
						<input class="form-control" type="text" name="data_cadastroView" 
							id="data_cadastroView"
							style = 'text-align: center;text-transform: uppercase;letter-spacing: 2px;font-weight: bold;'
							readonly
						 	value="<?= Yii::$app->formatter->asDate($model->data_cadastro, "d/MM/Y"); ?>">
					</div>
					<div class="col-sm-3">
						<label for="data_expiraView">Data em que Expira acesso:</label>
						<input class="form-control" type="text" name="data_expiraView" 
							id="data_expiraView" 
							style = 'text-align: center;text-transform: uppercase;letter-spacing: 2px;font-weight: bold;'
							readonly
							value="<?= Yii::$app->formatter->asDate($model->data_expira, "d/MM/Y"); ?>">
					</div>
				<?php
				}
			?>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<?= $form->field($model, 'paciente')->textInput(['maxlength' => true]) ?>
				</div>
				<div class="col-sm-4">
					<?= $form->field($model, 'genero')->widget(Select2::className(), [
						'data' => [
							'Macho' => 'Macho',
							'Femea' => 'Femea',
						],
						'options' => ['placeholder' => 'Selecione o Sexo'],
						'pluginOptions' => [
							'allowClear' => true
						]
					]) ?>
				</div>
				<div class="col-sm-4">
					<?= $form->field($model, 'idade')->textInput(['maxlength' => true]) ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<?php
						$especieId = Especies::find()->select(['id'])->where(['titulo' => $model->especie])->one();
						$model->especie = $especieId['id'];
					?>
					<?= $form->field($model, 'especie')->widget(Select2::className(), [
						'data'    => ArrayHelper::map(Especies::find()->all(), 'id', 'titulo'),
						'options' => ['placeholder' => 'Selecione uma Espécie'],
						'pluginOptions' => ['allowClear' => true]
					]) ?>
				</div>
				<div class="col-sm-4">
					<?= $form->field($model, 'especie_raca')->widget(DepDrop::className(), [
						'type'    => DepDrop::TYPE_SELECT2,
						'options' => [
							'id' => 'especies_racas_id',
							'placeholder' => 'Depende da Espécie',
						],
						'pluginOptions' => [
							'depends'     => ['protocolos-especie'],
							'url' 		  => Url::to(['/protocolos/racas']),
							'loadingText' => 'Carregando as Raças',
						],
					]) ?>
				</div>
				<div class="col-sm-4">
					<!-- empty -->
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<?= $form->field($model, 'convenio_id')->widget(Select2::className(), [
						'data' => ArrayHelper::map(Convenios::find()->all(), 'id', 'titulo'),
						'options' => ['placeholder' => 'Selecione o Convênio'],
						'pluginOptions' => ['allowClear' => true]
					]) ?>
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
					<?php /*$form->field($model, 'contato')->widget(MaskedInput::className(), [
						'mask' => '99 9999-9999',
						'clientOptions' => [
							'maxlength' => true,
							'placeholder' => '00 0000-0000'
						]
					]) */?>
				</div>
				<div class="col-sm-4">
					<?php /* $form->field($model, 'contatoConfirmar')->widget(MaskedInput::className(), [
						'mask' => '99 9999-9999',
						'clientOptions' => [
							'maxlength' => true,
							'placeholder' => '00 0000-0000'
						]
					]) */?>
				</div>
			</div>
			<?php
			if ($model->scenario == "update"){
				?>
				<div class="row">
					<div class="col-sm-12">
						<h4>
							EM BREVE CRIAREMOS ESTA FUNCIONALIDADE
							<br>
							Criar Link para Adicionar Laudos em POPPup
						</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<?= $form->field($model, 'anestesia')->textInput(['maxlength' => true]) ?>
					</div>
					<div class="col-sm-3">
						<?= $form->field($model, 'anestesia_valor')->textInput(['maxlength' => true]) ?>
					</div>
					<div class="col-sm-3">
						<?= $form->field($model, 'desconto')->textInput(['maxlength' => true]) ?>
					</div>
					<div class="col-sm-3">
						<?= $form->field($model, 'desconto_valor')->textInput(['maxlength' => true]) ?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<!--  -->
					</div>
					<div class="col-sm-3">
						<?= $form->field($model, 'valor')->textInput(['maxlength' => true]) ?>
					</div>
					<div class="col-sm-3">
						<?= $form->field($model, 'isento')->textInput(['maxlength' => true]) ?>
					</div>
					<div class="col-sm-3">
						<?= $form->field($model, 'pago')->textInput(['maxlength' => true]) ?>
					</div>
				</div>
				<?php
			}
			?>
			<div class="row"></div>
			<div class="form-group">
				<?= Html::submitButton(
					$model->isNewRecord ? 'Cadastrar' : 'Atualizar',
					['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
				) ?>
				<?= Html::a(Yii::t('app', 'Cancel'), ['protocolos/index'], ['class' => 'btn btn-default']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>