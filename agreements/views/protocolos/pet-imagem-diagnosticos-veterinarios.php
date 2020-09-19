<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model backend\models\Protocolos */
function returnMonth(Type $month = null)
{
    switch ($month) {
        case '01':
            echo "Janeiro";
            break;
        case '02':
            echo "Fevereiro";
            break;
        case '03':
            echo "Março";
            break;
        case '04':
            echo "Abril";
            break;
        case '05':
            echo "Maio";
            break;
        case '06':
            echo "Junho";
            break;
        case '07':
            echo "Junho";
            break;
        case '08':
            echo "Agosto";
            break;
        case '09':
            echo "Setembro";
            break;
        case '10':
            echo "Outubro";
            break;
        case '11':
            echo "Novembro";
            break;
        case '12':
            echo "Dezembro";
            break;
        default:
            # code...
            break;
    }
}
\yii\web\YiiAsset::register($this);
//
use agreements\models\Protocolos;
//
$protocolo = Protocolos::find()
    ->with([
        'laudosApCitopatologia',
        'laudosApCitopatologiaVaginal',
        'laudosApHistopatologia',
        'laudosDiEndoscopia',
        'laudosDiRaioXes',
        'laudosDiRaioXContrastado',
        'laudosDiUsAparelhoFeminino',
        'laudosDiUsEstrutura',
        'laudosDiUsExploratoria',
        'laudosDiUsGestacional',
        'laudosDiUsObstetrica',
        'laudosDiUsPosParto',
    ])
    ->where(['id' => $model->id])
    ->asArray()
    ->one();
?>

<div class="protocolos-view">
    <?php
    $apCitopatologia = $protocolo['laudosApCitopatologia'];
    if ($apCitopatologia) {
    ?>
    <div class="table-responsive">
        <table id="header" class="table table-striped">
            <tr>
                <td width="15%">Protocolo:</td>
                <td><?= $model->username; ?></td>
                <td width="15%">Solicitado:</td>
                <td><?= Yii::$app->formatter->asDate($model->data_cadastro,"d/M/Y"); ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Idade:</td>
                <td><?= $model->idade; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Sexo:</td>
                <td><?= $model->genero; ?></td>
            </tr>
            <tr>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
                <td width="15%">Tutor:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Dr(a):</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
        </table>
        <table id="body" class="table table-striped">

            <tr>
                <th style="text-align: center; text-transform: uppercase;">Laudo de Citopatologia</th>
            </tr>
            <tr>
                <td>Amostra</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $apCitopatologia->amostra; ?>
                </td>
            </tr>
            <tr>
                <td>Exame</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $apCitopatologia->exame; ?>
                </td>
            </tr>
            <tr>
                <td>Conclusão</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $apCitopatologia->conclusao; ?>
                </td>
            </tr>
            <tr>
                <td>Data do laudo:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $apCitopatologia->concluido; ?>
                </td>
            </tr>
        </table>
        <table id="footer" class="table table-striped">
            <tr>
                <td class="text-center"><?= "Curitiba " . date('d') . " de " . returnMonth(date('m')) . " de "  . date('Y'); ?></td>
            </tr>
        </table>
    </div>
    <?php
    }
    $apCitopatologiaVaginal = $protocolo['laudosApCitopatologiaVaginal'];
    if ($apCitopatologiaVaginal) {
    ?>
        <table id="header" class="table table-striped">
            <tr>
                <td width="15%">Protocolo:</td>
                <td><?= $model->username; ?></td>
                <td width="15%">Solicitado:</td>
                <td><?= Yii::$app->formatter->asDate($model->data_cadastro,"d/M/Y"); ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Idade:</td>
                <td><?= $model->idade; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Sexo:</td>
                <td><?= $model->genero; ?></td>
            </tr>
            <tr>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
                <td width="15%">Tutor:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Dr(a):</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
        </table>
        <table id="body" class="table table-striped">

            <tr>
                <th style="text-align: center; text-transform: uppercase;">Laudo de Citopatologia Vaginal</th>
            </tr>
            <tr>
                <td>Amostra</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $apCitopatologiaVaginal->amostra; ?>
                </td>
            </tr>
            <?php
            if (!empty($apCitopatologiaVaginal->epiteliais_queratinizadas)) {
                ?>
                <tr>
                    <td>Células epiteliais queratinizadas</td>
                </tr>
                <tr>
                    <td style="text-indent: 20px; text-align: justify;">
                        <?= $apCitopatologiaVaginal->epiteliais_queratinizadas; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            <?php
            if (!empty($apCitopatologiaVaginal->epiteliais_queratinizadas_n)) {
                ?>
                <tr>
                    <td>Células epiteliais não queratinizadas</td>
                </tr>
                <tr>
                    <td style="text-indent: 20px; text-align: justify;">
                        <?= $apCitopatologiaVaginal->epiteliais_queratinizadas_n; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td>Eritrocitos</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $apCitopatologiaVaginal->eritrocitos; ?>
                </td>
            </tr>
            <tr>
                <td>Bacterias</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $apCitopatologiaVaginal->bacterias; ?>
                </td>
            </tr>
            <tr>
                <td>Leucocitos</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $apCitopatologiaVaginal->leucocitos; ?>
                </td>
            </tr>
            <?php
            if (!empty($apCitopatologiaVaginal->em_branco)) {
                ?>
                <tr>
                    <td><?= $apCitopatologiaVaginal->em_branco; ?></td>
                </tr>
                <tr>
                    <td style="text-indent: 20px; text-align: justify;">
                        <?= $apCitopatologiaVaginal->em_branco_; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td>Diagnóstico</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $apCitopatologiaVaginal->diagnostico; ?>
                </td>
            </tr>
            <tr>
                <td>Data do laudo:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $apCitopatologiaVaginal->concluido; ?>
                </td>
            </tr>
        </table>
        <table id="footer" class="table table-striped">
            <tr>
                <td class="text-center"><?= "Curitiba " . date('d') . " de " . returnMonth(date('m')) . " de "  . date('Y'); ?></td>
            </tr>
        </table>
    <?php
    }
    $apHistopatologia = $protocolo['laudosApHistopatologia'];
    if ($apHistopatologia) {
    ?>
        <table id="header" class="table table-striped">
            <tr>
                <td width="15%">Protocolo:</td>
                <td><?= $model->username; ?></td>
                <td width="15%">Solicitado:</td>
                <td><?= Yii::$app->formatter->asDate($model->data_cadastro,"d/M/Y"); ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Idade:</td>
                <td><?= $model->idade; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Sexo:</td>
                <td><?= $model->genero; ?></td>
            </tr>
            <tr>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
                <td width="15%">Tutor:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Dr(a):</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
        </table>
        <table id="body" class="table table-striped">
            <tr>
                <th style="text-align: center; text-transform: uppercase;">Laudo de Histopatologia</th>
            </tr>
            <tr>
                <td>Amostra</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $apHistopatologia->amostra; ?>
                </td>
            </tr>
            <tr>
                <td>Exame</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $apHistopatologia->exame; ?>
                </td>
            </tr>
            <tr>
                <td>Conclusão</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $apHistopatologia->conclusao; ?>
                </td>
            </tr>
            <tr>
                <td>Data do laudo:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $apHistopatologia->concluido; ?>
                </td>
            </tr>
        </table>
        <table id="footer" class="table table-striped">
            <tr>
                <td class="text-center"><?= "Curitiba " . date('d') . " de " . returnMonth(date('m')) . " de "  . date('Y'); ?></td>
            </tr>
        </table>
    <?php
    }
    
    $di_endoscopia = $protocolo['laudosDiEndoscopia'];
    if ($di_endoscopia) {
    ?>
        <table id="header" class="table table-striped">
            <tr>
                <td width="15%">Protocolo:</td>
                <td><?= $model->username; ?></td>
                <td width="15%">Solicitado:</td>
                <td><?= Yii::$app->formatter->asDate($model->data_cadastro,"d/M/Y"); ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Idade:</td>
                <td><?= $model->idade; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Sexo:</td>
                <td><?= $model->genero; ?></td>
            </tr>
            <tr>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
                <td width="15%">Tutor:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Dr(a):</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
        </table>
        <table id="body" class="table table-striped">

            <tr>
                <th style="text-align: center; text-transform: uppercase;">Laudo de Endoscopia</th>
            </tr>
            <tr>
                <td>Local</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $di_endoscopia->local; ?>
                </td>
            </tr>
            <tr>
                <td>Comentário</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $di_endoscopia->comentario; ?>
                </td>
            </tr>
            <tr>
                <td>Interpretação</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $di_endoscopia->interpretacao; ?>
                </td>
            </tr>
            <tr>
                <td>Conclusão</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $di_endoscopia->conclusao; ?>
                </td>
            </tr>
            <tr>
                <td>Data do laudo:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $di_endoscopia->concluido; ?>
                </td>
            </tr>
        </table>
        <table id="footer" class="table table-striped">
            <tr>
                <td class="text-center"><?= "Curitiba " . date('d') . " de " . returnMonth(date('m')) . " de "  . date('Y'); ?></td>
            </tr>
        </table>
    <?php
    } ?>
    <?php
    $di_raio_x = $protocolo['laudosDiRaioXes'];
    if ($di_raio_x) {
    ?>
        <table id="header" class="table table-striped">
            <tr>
                <td width="15%">Protocolo:</td>
                <td><?= $model->username; ?></td>
                <td width="15%">Solicitado:</td>
                <td><?= Yii::$app->formatter->asDate($model->data_cadastro,"d/M/Y"); ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Idade:</td>
                <td><?= $model->idade; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Sexo:</td>
                <td><?= $model->genero; ?></td>
            </tr>
            <tr>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
                <td width="15%">Tutor:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Dr(a):</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
        </table>
        <table id="body" class="table table-striped">

            <tr>
                <th style="text-align: center; text-transform: uppercase;">Laudo de Raio-x</th>
            </tr>
            <tr>
                <td>Região:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px;text-align: justify;">
                    <?= $di_raio_x['regiao']; ?>
                </td>
            </tr>
            <tr>
                <td>Descrição:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $di_raio_x['descricao']; ?>
                </td>
            </tr>
            <?php
            if (!empty($di_raio_x['interpretacao'])) {
            ?>
                <tr>
                    <td>Interpretação:</td>
                </tr>
                <tr>
                    <td style="text-indent: 20px; text-align: justify;">
                        <?= $di_raio_x['interpretacao']; ?>
                    </td>
                </tr>
            <?php
            }
            if (!empty($di_raio_x['observacao'])) {
            ?>
                <tr>
                    <td>Observação:</td>
                </tr>
                <tr>
                    <td style="text-indent: 20px; text-align: justify;">
                        <?= $di_raio_x['observacao']; ?>
                    </td>
                </tr>
            <?php
            } ?>
            <tr>
                <td>Data do Laudo:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= Yii::$app->formatter->asDate($di_raio_x['concluido']); ?>
                </td>
            </tr>
        </table>
        <table id="footer" class="table table-striped">
            <tr>
                <td class="text-center"><?= "Curitiba " . date('d') . " de " . returnMonth(date('m')) . " de "  . date('Y'); ?></td>
            </tr>
        </table>
    <?php
    } ?>
    <?php
    $di_raio_x_contrastado = $protocolo['laudosDiRaioXContrastado'];
    if ($di_raio_x_contrastado) {
    ?>
        <table id="header" class="table table-striped">
            <tr>
                <td width="15%">Protocolo:</td>
                <td><?= $model->username; ?></td>
                <td width="15%">Solicitado:</td>
                <td><?= Yii::$app->formatter->asDate($model->data_cadastro,"d/M/Y"); ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Idade:</td>
                <td><?= $model->idade; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Sexo:</td>
                <td><?= $model->genero; ?></td>
            </tr>
            <tr>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
                <td width="15%">Tutor:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Dr(a):</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
        </table>
        <table id="body" class="table table-striped">
            <tr>
                <th style="text-align: center; text-transform: uppercase;">Laudo de Raio-x Contrastado</th>
            </tr>
            <tr>
                <td>Técnica:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px;text-align: justify;">
                    <?= $di_raio_x_contrastado['tecnica']; ?>
                </td>
            </tr>
            <tr>
                <td>Descrição:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $di_raio_x_contrastado['descricao']; ?>
                </td>
            </tr>
            <tr>
                <td>Interpretação:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $di_raio_x_contrastado['interpretacao']; ?>
                </td>
            </tr>
            <tr>
                <td>Observação:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $di_raio_x_contrastado['observacao']; ?>
                </td>
            </tr>
            <tr>
                <td>Data do Laudo:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= Yii::$app->formatter->asDate($di_raio_x_contrastado['concluido']); ?>
                </td>
            </tr>
        </table>
        <table id="footer" class="table table-striped">
            <tr>
                <td class="text-center"><?= "Curitiba " . date('d') . " de " . returnMonth(date('m')) . " de "  . date('Y'); ?></td>
            </tr>
        </table>
    <?php
    } ?>
    <?php
    $di_us_aparelho_feminino = $protocolo['laudosDiUsAparelhoFeminino'];
    if ($di_us_aparelho_feminino) {
    ?>
        <table id="header" class="table table-striped">
            <tr>
                <td width="15%">Protocolo:</td>
                <td><?= $model->username; ?></td>
                <td width="15%">Solicitado:</td>
                <td><?= Yii::$app->formatter->asDate($model->data_cadastro,"d/M/Y"); ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Idade:</td>
                <td><?= $model->idade; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Sexo:</td>
                <td><?= $model->genero; ?></td>
            </tr>
            <tr>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
                <td width="15%">Tutor:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Dr(a):</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
        </table>
        <table id="body" class="table table-striped">

            <tr>
                <th style="text-align: center; text-transform: uppercase;">Laudo de Ultrassonografia Aparelho Feminino</th>
            </tr>
            <tr>
                <td>Descrição:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $di_us_aparelho_feminino['descricao']; ?>
                </td>
            </tr>
            <tr>
                <td>Data do Laudo:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= Yii::$app->formatter->asDate($di_us_aparelho_feminino['concluido']); ?>
                </td>
            </tr>
        </table>
        <table id="footer" class="table table-striped">
            <tr>
                <td class="text-center"><?= "Curitiba " . date('d') . " de " . returnMonth(date('m')) . " de "  . date('Y'); ?></td>
            </tr>
        </table>
    <?php
    } ?>
    <?php
    $di_us_estrutura = $protocolo['laudosDiUsEstrutura'];
    if ($di_us_estrutura) {
    ?>
        <table id="header" class="table table-striped">
            <tr>
                <td width="15%">Protocolo:</td>
                <td><?= $model->username; ?></td>
                <td width="15%">Solicitado:</td>
                <td><?= Yii::$app->formatter->asDate($model->data_cadastro,"d/M/Y"); ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Idade:</td>
                <td><?= $model->idade; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Sexo:</td>
                <td><?= $model->genero; ?></td>
            </tr>
            <tr>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
                <td width="15%">Tutor:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Dr(a):</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
        </table>
        <table id="body" class="table table-striped">
            <tr>
                <th style="text-align: center; text-transform: uppercase;">Laudo de Ultrassonografia de Estruturas</th>
            </tr>
            <tr>
                <td>Local:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px;text-align: justify;">
                    <?= $di_us_estrutura['local']; ?>
                </td>
            </tr>
            <tr>
                <td>Descrição:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $di_us_estrutura['descricao']; ?>
                </td>
            </tr>
            <tr>
                <td>Data do Laudo:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= Yii::$app->formatter->asDate($di_us_estrutura['concluido']); ?>
                </td>
            </tr>
        </table>
        <table id="footer" class="table table-striped">
            <tr>
                <td class="text-center"><?= "Curitiba " . date('d') . " de " . returnMonth(date('m')) . " de "  . date('Y'); ?></td>
            </tr>
        </table>
    <?php
    } ?>
    <?php
    $di_us_exploratoria = $protocolo['laudosDiUsExploratoria'];
    if ($di_us_exploratoria) {
    ?>
        <table id="header" class="table table-striped">
            <tr>
                <td width="15%">Protocolo:</td>
                <td><?= $model->username; ?></td>
                <td width="15%">Solicitado:</td>
                <td><?= Yii::$app->formatter->asDate($model->data_cadastro,"d/M/Y"); ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Idade:</td>
                <td><?= $model->idade; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Sexo:</td>
                <td><?= $model->genero; ?></td>
            </tr>
            <tr>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
                <td width="15%">Tutor:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Dr(a):</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
        </table>
        <table id="body" class="table table-striped">
            <tr>
                <th style="text-align: center; text-transform: uppercase;">Laudo de Ultrassonografia Exploratória</th>
            </tr>
            <tr>
                <td>Descrição:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $di_us_exploratoria['descricao']; ?>
                </td>
            </tr>
            <tr>
                <td>Data do Laudo:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= Yii::$app->formatter->asDate($di_us_exploratoria['concluido']); ?>
                </td>
            </tr>
        </table>
        <table id="footer" class="table table-striped">
            <tr>
                <td class="text-center"><?= "Curitiba " . date('d') . " de " . returnMonth(date('m')) . " de "  . date('Y'); ?></td>
            </tr>
        </table>
    <?php
    } ?>
    <?php
    $di_us_gestacional = $protocolo['laudosDiUsGestacional'];
    if ($di_us_gestacional) {
    ?>
        <table id="header" class="table table-striped">
            <tr>
                <td width="15%">Protocolo:</td>
                <td><?= $model->username; ?></td>
                <td width="15%">Solicitado:</td>
                <td><?= Yii::$app->formatter->asDate($model->data_cadastro,"d/M/Y"); ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Idade:</td>
                <td><?= $model->idade; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Sexo:</td>
                <td><?= $model->genero; ?></td>
            </tr>
            <tr>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
                <td width="15%">Tutor:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Dr(a):</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
        </table>
        <table id="body" class="table table-striped">
            <tr>
                <th style="text-align: center; text-transform: uppercase;">Laudo de Ultrassonografia Gestacional</th>
            </tr>
            <tr>
                <td>Descrição:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $di_us_gestacional['descricao']; ?>
                </td>
            </tr>
            <tr>
                <td>Data do Laudo:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= Yii::$app->formatter->asDate($di_us_gestacional['concluido']); ?>
                </td>
            </tr>
        </table>
        <table id="footer" class="table table-striped">
            <tr>
                <td class="text-center"><?= "Curitiba " . date('d') . " de " . returnMonth(date('m')) . " de "  . date('Y'); ?></td>
            </tr>
        </table>
    <?php
    } ?>
    <?php
    $di_us_obstetrica = $protocolo['laudosDiUsObstetrica'];
    if ($di_us_obstetrica) {
    ?>
        <table id="header" class="table table-striped">
            <tr>
                <td width="15%">Protocolo:</td>
                <td><?= $model->username; ?></td>
                <td width="15%">Solicitado:</td>
                <td><?= Yii::$app->formatter->asDate($model->data_cadastro,"d/M/Y"); ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Idade:</td>
                <td><?= $model->idade; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Sexo:</td>
                <td><?= $model->genero; ?></td>
            </tr>
            <tr>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
                <td width="15%">Tutor:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Dr(a):</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
        </table>
        <table id="body" class="table table-striped">

            <tr>
                <th style="text-align: center; text-transform: uppercase;">Laudo de Ultrassonografia Obstétrica</th>
            </tr>
            <tr>
                <td>Descrição:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $di_us_obstetrica['descricao']; ?>
                </td>
            </tr>
            <tr>
                <td>Data do Laudo:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= Yii::$app->formatter->asDate($di_us_obstetrica['concluido']); ?>
                </td>
            </tr>
        </table>
        <table id="footer" class="table table-striped">
            <tr>
                <td class="text-center"><?= "Curitiba " . date('d') . " de " . returnMonth(date('m')) . " de "  . date('Y'); ?></td>
            </tr>
        </table>
    <?php
    } ?>
    <?php
    $di_us_pos_parto = $protocolo['laudosDiUsPosParto'];
    if ($di_us_pos_parto) {
    ?>
        <table id="header" class="table table-striped">
            <tr>
                <td width="15%">Protocolo:</td>
                <td><?= $model->username; ?></td>
                <td width="15%">Solicitado:</td>
                <td><?= Yii::$app->formatter->asDate($model->data_cadastro,"d/M/Y"); ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Idade:</td>
                <td><?= $model->idade; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Sexo:</td>
                <td><?= $model->genero; ?></td>
            </tr>
            <tr>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
                <td width="15%">Tutor:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Dr(a):</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
        </table>
        <table id="body" class="table table-striped">
            <tr>
                <th style="text-align: center; text-transform: uppercase;">Laudo de Ultrassonografia Pós Parto</th>
            </tr>
            <tr>
                <td>Descrição:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= $di_us_pos_parto['descricao']; ?>
                </td>
            </tr>
            <tr>
                <td>Data do Laudo:</td>
            </tr>
            <tr>
                <td style="text-indent: 20px; text-align: justify;">
                    <?= Yii::$app->formatter->asDate($di_us_pos_parto['concluido']); ?>
                </td>
            </tr>
        </table>
        <table id="footer" class="table table-striped">
            <tr>
                <td class="text-center"><?= "Curitiba " . date('d') . " de " . returnMonth(date('m')) . " de "  . date('Y'); ?></td>
            </tr>
        </table>
    <?php
    }?>
</div>