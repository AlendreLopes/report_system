<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
//
use backend\models\Protocolos;
//
/*
$protocolo = Protocolos::find()
->where(['id' => $model->id])
->with([
    'laudosApCitopatologia',
    'laudosApCitopatologiaVaginal',
    'laudosApHistopatologia',
    'laudosDiEndoscopia',
    'laudosDiRaioX',
    'laudosDiRaioXContrastado',
    'laudosDiUsAparelhoFeminino',
    'laudosDiUsEstrutura',
    'laudosDiUsExploratoria',
    'laudosDiUsGestacional',
    'laudosDiUsObstetrica',
    'laudosDiUsPosParto',
])->one();
*/
// Variável para exibir se há ou não laudos para impressão
$readyToPrint = 0;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\laudos\models\ProtocolosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider

$this->title = 'Imprimir Protocolos';
$this->params['breadcrumbs'][] = ['label' => 'Laudos', 'url' => ['/protocolos/index']];
$this->params['breadcrumbs'][] = $this->title;
 */
?>

<div class="protocolos-index">

    <?php echo $this->render('@app/views/laudos-menu/menuLaudos'); ?>
    <hr>
	<div class="container-fluid">
		<div class="col-xs-12 col-sm-12 col-md-12 text-center"> PROTOCOLO</div>
        <div class="col-xs-12 col-sm-12 col-md-12" style="width:95%; border:solid 1px black;">
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">Cadastrar</div>
                <div class="col-xs-3 col-sm-3 col-md-3">Paciente</div>
                <div class="col-xs-3 col-sm-3 col-md-3">Raça</div>
                <div class="col-xs-3 col-sm-3 col-md-3">Senha</div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">Dados</div>
                <div class="col-xs-3 col-sm-3 col-md-3">Dados</div>
                <div class="col-xs-3 col-sm-3 col-md-3">Dados</div>
                <div class="col-xs-3 col-sm-3 col-md-3">Dados</div>
            </div>
        </div>
	</div>

    <hr>
	<div class="container-fluid">
		<div class="col-xs-12 col-sm-12 col-md-12 text-center"> TITULO DO LAUDO </div>
        <div class="col-xs-12 col-sm-12 col-md-12" style="width:95%; border:solid 1px black;">
        <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">Visualizar</div>
                <div class="col-xs-3 col-sm-3 col-md-3">Clínica</div>
                <div class="col-xs-3 col-sm-3 col-md-3">Paciente</div>
                <div class="col-xs-3 col-sm-3 col-md-3">Sexo</div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">Dados</div>
                <div class="col-xs-3 col-sm-3 col-md-3">Dados</div>
                <div class="col-xs-3 col-sm-3 col-md-3">Dados</div>
                <div class="col-xs-3 col-sm-3 col-md-3">Dados</div>
            </div>
        </div>
	</div>
</div>