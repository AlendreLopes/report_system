<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
//
use backend\models\Protocolos;
//
$numberOrUsername = $searchModel["attributes"]["username"];
$protocolo = Protocolos::find()
->select(['id','convenio_id','username','motedepass','paciente','especie_raca','genero','data_cadastro'])
->where(['like', 'numero', $numberOrUsername])
->orFilterWhere(['like', 'username', $numberOrUsername])
->with([
    'convenios',
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
])
->one();
//
// Variável para exibir se há ou não laudos para impressão
$readyToPrint = 0;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\laudos\models\ProtocolosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
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
                <tr>
                    <td><?= Html::a($protocolo['username'], Url::to(['protocolos/create-report', 'id' => $protocolo['id']]), ['title' => 'Cadastrar Laudos']);?></td>
                    <td><?= $protocolo['paciente'];?></td>
                    <td><?= $protocolo['especie_raca'];?></td>
                    <td><?= $protocolo['motedepass'];?></td>
                </tr>
            </table>
        </div>
        <hr>
        <?php
        if($protocolo['laudosApCitopatologia']){
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
                            <?= Html::a($protocolo['username'], Url::to(['laudos-ap-citopatologia/view', 'id' => $protocolo['laudosApCitopatologia']['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $protocolo['convenios']['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['laudosApCitopatologia']['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-ap-citopatologia/delete', 'id' => $protocolo['laudosApCitopatologia']['id']], [
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
        if($protocolo['laudosApCitopatologiaVaginal']){
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
                            <?= Html::a($protocolo['username'], Url::to(['laudos-ap-citopatologia-vaginal/view', 'id' => $protocolo['laudosApCitopatologiaVaginal']['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $protocolo['convenios']['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['laudosApCitopatologiaVaginal']['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-ap-citopatologia-vaginal/delete', 'id' => $protocolo['laudosApCitopatologiaVaginal']['id']], [
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
        if($protocolo['laudosApHistopatologia']){
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
                            <?= Html::a($protocolo['username'], Url::to(['laudos-ap-histopatologia/view', 'id' => $protocolo['laudosApHistopatologia']['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $protocolo['convenios']['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['laudosApHistopatologia']['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-ap-histopatologia/delete', 'id' => $protocolo['laudosApHistopatologia']['id']], [
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
        if($protocolo['laudosApNecropsia']){
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
                            <?= Html::a($protocolo['username'], Url::to(['laudos-ap-necropsia/view', 'id' => $protocolo['laudosApNecropsia']['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $protocolo['convenios']['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['laudosApNecropsia']['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-ap-necropsia/delete', 'id' => $protocolo['laudosApNecropsia']['id']], [
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
        if($protocolo['laudosDiEndoscopia']){
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
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-endoscopia/view', 'id' => $protocolo['laudosDiEndoscopia']['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $protocolo['convenios']['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['laudosDiEndoscopia']['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-endoscopia/delete', 'id' => $protocolo['laudosDiEndoscopia']['id']], [
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
        if($protocolo['laudosDiRaioX']){
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
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-raio-x/view', 'id' => $protocolo['laudosDiRaioX']['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $protocolo['convenios']['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['laudosDiRaioX']['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-raio-x/delete', 'id' => $protocolo['laudosDiRaioX']['id']], [
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
        if($protocolo['laudosDiRaioXContrastado']){
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
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-raio-x-contrastado/view', 'id' => $protocolo['laudosDiRaioXContrastado']['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $protocolo['convenios']['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['laudosDiRaioXContrastado']['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-raio-x-contrastado/delete', 'id' => $protocolo['laudosDiRaioXContrastado']['id']], [
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
        if($protocolo['laudosDiUsAparelhoFeminino']){
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
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-us-aparelho-feminino/view', 'id' => $protocolo['laudosDiUsAparelhoFeminino']['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $protocolo['convenios']['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['laudosDiUsAparelhoFeminino']['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-us-aparelho-feminino/delete', 'id' => $protocolo['laudosDiUsAparelhoFeminino']['id']], [
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
        if($protocolo['laudosDiUsEstrutura']){
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
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-us-estrutura/view', 'id' => $protocolo['laudosDiUsEstrutura']['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $protocolo['convenios']['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['laudosDiUsEstrutura']['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-us-estrutura/delete', 'id' => $protocolo['laudosDiUsEstrutura']['id']], [
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
        if($protocolo['laudosDiUsExploratoria']){
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
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-us-exploratoria/view', 'id' => $protocolo['laudosDiUsExploratoria']['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $protocolo['convenios']['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['laudosDiUsExploratoria']['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-us-exploratoria/delete', 'id' => $protocolo['laudosDiUsExploratoria']['id']], [
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
        if($protocolo['laudosDiUsGestacional']){
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
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-us-gestacional/view', 'id' => $protocolo['laudosDiUsGestacional']['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $protocolo['convenios']['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['laudosDiUsGestacional']['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-us-gestacional/delete', 'id' => $protocolo['laudosDiUsGestacional']['id']], [
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
        if($protocolo['laudosDiUsObstetrica']){
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
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-us-obstetrica/view', 'id' => $protocolo['laudosDiUsObstetrica']['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $protocolo['convenios']['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['laudosDiUsObstetrica']['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-us-obstetrica/delete', 'id' => $protocolo['laudosDiUsObstetrica']['id']], [
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
        if($protocolo['laudosDiUsPosParto']){
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
                            <?= Html::a($protocolo['username'], Url::to(['laudos-di-us-pos-parto/view', 'id' => $protocolo['laudosDiUsPosParto']['id']]), ['title' => 'Cadastrar Laudos']);?>
                        </td>
                        <td><?= $protocolo['paciente'];?></td>
                        <td><?= $protocolo['genero'];?></td>
                        <td><?= $protocolo['convenios']['titulo'];?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['data_cadastro']);?></td>
                        <td><?= Yii::$app->formatter->asDate($protocolo['laudosDiUsPosParto']['concluido']);?></td>
                        <td>
                            <?= Html::a('Excluir', ['laudos-di-us-pos-parto/delete', 'id' => $protocolo['laudosDiUsPosParto']['id']], [
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