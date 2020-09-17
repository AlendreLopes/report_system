<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
//
use backend\models\Protocolos;
use backend\models\Convenios;
use backend\models\LaudosApCitopatologia;
use backend\models\LaudosApCitopatologiaVaginal;
use backend\models\LaudosApHistopatologia;
use backend\models\LaudosApNecropsia;
use backend\models\LaudosDiEndoscopia;
use backend\models\LaudosDiRaioX;
use backend\models\LaudosDiRaioXContrastado;
use backend\models\LaudosDiUsAparelhoFeminino;
use backend\models\LaudosDiUsEstrutura;
use backend\models\LaudosDiUsExploratoria;
use backend\models\LaudosDiUsGestacional;
use backend\models\LaudosDiUsObstetrica;
use backend\models\LaudosDiUsPosParto;
// Procura o Protocolo
$numberOrUsername = $searchModel["attributes"]["username"];
$protocolo = Protocolos::find()
->select('protocolos.*')
->where(['like', 'numero', $numberOrUsername])
->orFilterWhere(['like', 'username', $numberOrUsername])
->one();
// Relacionamentos
$convenios = Convenios::findOne(['id' => $protocolo['convenio_id']]);
$apCitopatologia = LaudosApCitopatologia::findOne(['protocolos_id' => $protocolo['id']]);
$apCitopatologiaVaginal = LaudosApCitopatologiaVaginal::findOne(['protocolos_id' => $protocolo['id']]);
$apHistopatologia = LaudosApHistopatologia::findOne(['protocolos_id' => $protocolo['id']]);
$apNecropsia = LaudosApNecropsia::findOne(['protocolos_id' => $protocolo['id']]);
$diEndoscopia = LaudosDiEndoscopia::findOne(['protocolos_id' => $protocolo['id']]);
$diRaioX = LaudosDiRaioX::findOne(['protocolos_id' => $protocolo['id']]);
$diRaioXContrastado = LaudosDiRaioXContrastado::findOne(['protocolos_id' => $protocolo['id']]);
$diUsAparelhoFeminino = LaudosDiUsAparelhoFeminino::findOne(['protocolos_id' => $protocolo['id']]);
$diUsEstrutura = LaudosDiUsEstrutura::findOne(['protocolos_id' => $protocolo['id']]);
$diUsExploratoria = LaudosDiUsExploratoria::findOne(['protocolos_id' => $protocolo['id']]);
$diUsGestacional = LaudosDiUsGestacional::findOne(['protocolos_id' => $protocolo['id']]);
$diUsObstetrica = LaudosDiUsObstetrica::findOne(['protocolos_id' => $protocolo['id']]);
$diUsPosParto = LaudosDiUsPosParto::findOne(['protocolos_id' => $protocolo['id']]);
// Variável para exibir se há ou não laudos para impressão
$readyToPrint = 0;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\laudos\models\ProtocolosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = "Pesquisa de Laudos";
?>

<div class="protocolos-index">
    <?php echo $this->render('@app/views/laudos-menu/menuLaudos'); ?>
    <?php
    if ($protocolo) {
        ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th colspan="4" class="text-center">Protocolo</th>
                </tr>
                <tr>
                    <th>Cadastrar</th>
                    <th>Paciente</th>
                    <th>Raça</th>
                    <th>Senha</th>
                </tr>
                <tr class="text-center" style="text-transform: uppercase;font-weight: bold;">
                    <td><?= Html::a($protocolo['username'], Url::to(['protocolos/create-report', 'id' => $protocolo['id']]), ['title' => 'Cadastrar Laudos']);?></td>
                    <td><?= $protocolo['paciente'];?></td>
                    <td><?= $protocolo['especie_raca'];?></td>
                    <td><?= $protocolo['motedepass'];?></td>
                </tr>
            </table>
        </div>
        <hr>
        <?php
        if($apCitopatologia){
            $readyToPrint = 1;
            ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th colspan="7" class="text-center">Laudo de Citopatologia</th>
                    </tr>
                    <tr>
                        <th>Visualizar</th>
                        <th>Paciente</th>
                        <th>Sexo</th>
                        <th>Clínica</th>
                        <th>Solicitado</th>
                        <th>Concluido</th>
                        <th>Excluir</th>
                    </tr>
                    <tr>
                        <td>
                            <?= Html::a($protocolo['username'], Url::to(['laudos-ap-citopatologia/view', 'id' => $apCitopatologia['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $convenios['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($apCitopatologia['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-ap-citopatologia/delete', 'id' => $apCitopatologia['id']], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Você tem certeza que deseja deletar este Laudo?',
                                    'method' => 'post',
                                ],
                            ])?>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            <?php  
        }
        if($apCitopatologiaVaginal){
            $readyToPrint = 1;
            ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th colspan="7" class="text-center">Laudo de Citopatologia Vaginal</th>
                    </tr>
                    <tr>
                        <th>Visualizar</th>
                        <th>Paciente</th>
                        <th>Sexo</th>
                        <th>Clínica</th>
                        <th>Solicitado</th>
                        <th>Concluido</th>
                        <th>Excluir</th>
                    </tr>
                    <tr>
                        <td>
                            <?= Html::a($protocolo['username'], Url::to(['laudos-ap-citopatologia-vaginal/view', 'id' => $apCitopatologiaVaginal['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $convenios['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($apCitopatologiaVaginal['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-ap-citopatologia-vaginal/delete', 'id' => $apCitopatologiaVaginal['id']], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Você tem certeza que deseja deletar este Laudo?',
                                    'method' => 'post',
                                ],
                            ])?>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            <?php  
        }
        if($apHistopatologia){
            $readyToPrint = 1;
            ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th colspan="7" class="text-center">Laudo de Histopatologia</th>
                    </tr>
                    <tr>
                        <th>Visualizar</th>
                        <th>Paciente</th>
                        <th>Sexo</th>
                        <th>Clínica</th>
                        <th>Solicitado</th>
                        <th>Concluido</th>
                        <th>Excluir</th>
                    </tr>
                    <tr>
                        <td>
                            <?= Html::a($protocolo['username'], Url::to(['laudos-ap-histopatologia/view', 'id' => $apHistopatologia['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $convenios['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($apHistopatologia['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-ap-histopatologia/delete', 'id' => $apHistopatologia['id']], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Você tem certeza que deseja deletar este Laudo?',
                                    'method' => 'post',
                                ],
                            ])?>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            <?php  
        }
        if($apNecropsia){
            $readyToPrint = 1;
            ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th colspan="7" class="text-center">Laudo de Necropsia</th>
                    </tr>
                    <tr>
                        <th>Visualizar</th>
                        <th>Paciente</th>
                        <th>Sexo</th>
                        <th>Clínica</th>
                        <th>Solicitado</th>
                        <th>Concluido</th>
                        <th>Excluir</th>
                    </tr>
                    <tr>
                        <td>
                            <?= Html::a($protocolo['username'], Url::to(['laudos-ap-necropsia/view', 'id' => $apNecropsia['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $convenios['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($apNecropsia['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-ap-necropsia/delete', 'id' => $apNecropsia['id']], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Você tem certeza que deseja deletar este Laudo?',
                                    'method' => 'post',
                                ],
                            ])?>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            <?php  
        }
        if($diEndoscopia){
            $readyToPrint = 1;
            ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th colspan="7" class="text-center">Laudo de Endoscopia</th>
                    </tr>
                    <tr>
                        <th>Visualizar</th>
                        <th>Paciente</th>
                        <th>Sexo</th>
                        <th>Clínica</th>
                        <th>Solicitado</th>
                        <th>Concluido</th>
                        <th>Excluir</th>
                    </tr>
                    <tr>
                        <td>
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-endoscopia/view', 'id' => $diEndoscopia['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $convenios['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($diEndoscopia['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-endoscopia/delete', 'id' => $diEndoscopia['id']], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Você tem certeza que deseja deletar este Laudo?',
                                    'method' => 'post',
                                ],
                            ])?>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            <?php  
        }
        if($diRaioX){
            $readyToPrint = 1;
            ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th colspan="7" class="text-center">Laudo de Raio-x</th>
                    </tr>
                    <tr>
                        <th>Visualizar</th>
                        <th>Paciente</th>
                        <th>Sexo</th>
                        <th>Clínica</th>
                        <th>Solicitado</th>
                        <th>Concluido</th>
                        <th>Excluir</th>
                    </tr>
                    <tr>
                        <td>
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-raio-x/view', 'id' => $diRaioX['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $convenios['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($diRaioX['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-raio-x/delete', 'id' => $diRaioX['id']], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Você tem certeza que deseja deletar este Laudo?',
                                    'method' => 'post',
                                ],
                            ])?>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            <?php  
        }
        if($diRaioXContrastado){
            $readyToPrint = 1;
            ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th colspan="7" class="text-center">Laudo de Raio-x Contrastado</th>
                    </tr>
                    <tr>
                        <th>Visualizar</th>
                        <th>Paciente</th>
                        <th>Sexo</th>
                        <th>Clínica</th>
                        <th>Solicitado</th>
                        <th>Concluido</th>
                        <th>Excluir</th>
                    </tr>
                    <tr>
                        <td>
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-raio-x-contrastado/view', 'id' => $diRaioXContrastado['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $convenios['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($diRaioXContrastado['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-raio-x-contrastado/delete', 'id' => $diRaioXContrastado['id']], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Você tem certeza que deseja deletar este Laudo?',
                                    'method' => 'post',
                                ],
                            ])?>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            <?php  
        }
        if($diUsAparelhoFeminino){
            $readyToPrint = 1;
            ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th colspan="7" class="text-center">Laudo de Ultrasonografia Aparelho Feminino</th>
                    </tr>
                    <tr>
                        <th>Visualizar</th>
                        <th>Paciente</th>
                        <th>Sexo</th>
                        <th>Clínica</th>
                        <th>Solicitado</th>
                        <th>Concluido</th>
                        <th>Excluir</th>
                    </tr>
                    <tr>
                        <td>
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-us-aparelho-feminino/view', 'id' => $diUsAparelhoFeminino['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $convenios['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($diUsAparelhoFeminino['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-us-aparelho-feminino/delete', 'id' => $diUsAparelhoFeminino['id']], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Você tem certeza que deseja deletar este Laudo?',
                                    'method' => 'post',
                                ],
                            ])?>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            <?php  
        }
        if($diUsEstrutura){
            $readyToPrint = 1;
            ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th colspan="7" class="text-center">Laudo de Ultrasonografia Estruturas</th>
                    </tr>
                    <tr>
                        <th>Visualizar</th>
                        <th>Paciente</th>
                        <th>Sexo</th>
                        <th>Clínica</th>
                        <th>Solicitado</th>
                        <th>Concluido</th>
                        <th>Excluir</th>
                    </tr>
                    <tr>
                        <td>
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-us-estrutura/view', 'id' => $diUsEstrutura['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $convenios['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($diUsEstrutura['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-us-estrutura/delete', 'id' => $diUsEstrutura['id']], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Você tem certeza que deseja deletar este Laudo?',
                                    'method' => 'post',
                                ],
                            ])?>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            <?php  
        }
        if($diUsExploratoria){
            $readyToPrint = 1;
            ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th colspan="7" class="text-center">Laudo de Ultrasonografia Exploratória</th>
                    </tr>
                    <tr>
                        <th>Visualizar</th>
                        <th>Paciente</th>
                        <th>Sexo</th>
                        <th>Clínica</th>
                        <th>Solicitado</th>
                        <th>Concluido</th>
                        <th>Excluir</th>
                    </tr>
                    <tr>
                        <td>
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-us-exploratoria/view', 'id' => $diUsExploratoria['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $convenios['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($diUsExploratoria['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-us-exploratoria/delete', 'id' => $diUsExploratoria['id']], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Você tem certeza que deseja deletar este Laudo?',
                                    'method' => 'post',
                                ],
                            ])?>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            <?php  
        }
        if($diUsGestacional){
            $readyToPrint = 1;
            ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th colspan="7" class="text-center">Laudo de Ultrasonografia Gestacional</th>
                    </tr>
                    <tr>
                        <th>Visualizar</th>
                        <th>Paciente</th>
                        <th>Sexo</th>
                        <th>Clínica</th>
                        <th>Solicitado</th>
                        <th>Concluido</th>
                        <th>Excluir</th>
                    </tr>
                    <tr>
                        <td>
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-us-gestacional/view', 'id' => $diUsGestacional['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $convenios['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($diUsGestacional['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-us-gestacional/delete', 'id' => $diUsGestacional['id']], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Você tem certeza que deseja deletar este Laudo?',
                                    'method' => 'post',
                                ],
                            ])?>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            <?php  
        }
        if($diUsObstetrica){
            $readyToPrint = 1;
            ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th colspan="7" class="text-center">Laudo de Ultrasonografia Obstétrica</th>
                    </tr>
                    <tr>
                        <th>Visualizar</th>
                        <th>Paciente</th>
                        <th>Sexo</th>
                        <th>Clínica</th>
                        <th>Solicitado</th>
                        <th>Concluido</th>
                        <th>Excluir</th>
                    </tr>
                    <tr>
                        <td>
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-us-obstetrica/view', 'id' => $diUsObstetrica['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $convenios['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($diUsObstetrica['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-us-obstetrica/delete', 'id' => $diUsObstetrica['id']], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Você tem certeza que deseja deletar este Laudo?',
                                    'method' => 'post',
                                ],
                            ])?>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            <?php  
        }
        if($diUsPosParto){
            $readyToPrint = 1;
            ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th colspan="7" class="text-center">Laudo de Ultrasonografia Pós-parto</th>
                    </tr>
                    <tr>
                        <th>Visualizar</th>
                        <th>Paciente</th>
                        <th>Sexo</th>
                        <th>Clínica</th>
                        <th>Solicitado</th>
                        <th>Concluido</th>
                        <th>Excluir</th>
                    </tr>
                    <tr>
                        <td>
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-us-pos-parto/view', 'id' => $diUsPosParto['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $convenios['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($diUsPosParto['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-us-pos-parto/delete', 'id' => $diUsPosParto['id']], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Você tem certeza que deseja deletar este Laudo?',
                                    'method' => 'post',
                                ],
                            ])?>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            <?php  
        }
        if ($readyToPrint == 0) {
            ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th class="text-center" style="text-transform: uppercase;font-weight: bold;">Não há Laudos cadastrasdro sob o Protocolo</th>
                    </tr>
                    <tr>
                        <td class="text-center"><strong><?= $protocolo['username'];?></strong></td>
                    </tr>
                </table>
            </div>
            <hr>
            <?php
        }
    }
    ?>
</div>