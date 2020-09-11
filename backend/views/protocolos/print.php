<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\modules\secretaria\models\Protocolos */

$this->title = "Impressão: " . $model->protocolo;
$this->params['breadcrumbs'][] = ['label' => 'Laudos', 'url' => ['/laudos/protocolos/index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
//
use app\modules\laudos\models\Protocolos;
//
$protocolo = Protocolos::find()
    ->with([
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
    $di_endoscopia = $protocolo['laudosDiEndoscopia'];
    if ($di_endoscopia) {
    ?>
        <table id="header" class="table-responsive table table-striped">
            <!-- code -->
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Veterinário:</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Proprietário:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
            </tr>
        </table>
        <table id="body" class="table-responsive table table-striped">
            <!-- code -->
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
        <table id="footer" class="table-responsive table table-striped">
            <!-- code -->
            Rodapé
        </table>
    <?php
    } ?>
    <?php
    $di_raio_x = $protocolo['laudosDiRaioXes'];
    if ($di_raio_x) {
    ?>
        <table id="header" class="table-responsive table table-striped">
            <!-- code -->
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Veterinário:</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Proprietário:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
            </tr>
        </table>
        <table id="body" class="table-responsive table table-striped">
            <!-- code -->
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
            if (!empty($di_raio_x['interpretacao']) && ($di_raio_x['interpretacao'] != "Meketrefe")) {
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
            if (!empty($di_raio_x['observacao']) && ($di_raio_x['observacao'] != "Meketrefe")) {
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
        <table id="footer" class="table-responsive table table-striped">
            <!-- code -->
            Rodapé
        </table>
    <?php
    } ?>
    <?php
    $di_raio_x_contrastado = $protocolo['laudosDiRaioXContrastado'];
    if ($di_raio_x_contrastado) {
    ?>
        <table id="header" class="table-responsive table table-striped">
            <!-- code -->
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Veterinário:</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Proprietário:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
            </tr>
        </table>
        <table id="body" class="table-responsive table table-striped">
            <!-- code -->
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
        <table id="footer" class="table-responsive table table-striped">
            <!-- code -->
        </table>
    <?php
    } ?>
    <?php
    $di_us_aparelho_feminino = $protocolo['laudosDiUsAparelhoFeminino'];
    if ($di_us_aparelho_feminino) {
    ?>
        <table id="header" class="table-responsive table table-striped">
            <!-- code -->
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Veterinário:</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Proprietário:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
            </tr>
        </table>
        <table id="body" class="table-responsive table table-striped">
            <!-- code -->
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
        <table id="footer" class="table-responsive table table-striped">
            <!-- code -->

        </table>
    <?php
    } ?>
    <?php
    $di_us_estrutura = $protocolo['laudosDiUsEstrutura'];
    if ($di_us_estrutura) {
    ?>
        <table id="header" class="table-responsive table table-striped">
            <!-- code -->
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Veterinário:</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Proprietário:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
            </tr>
        </table>
        <table id="body" class="table-responsive table table-striped">
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
        <table id="footer" class="table-responsive table table-striped">
            <!-- code -->
        </table>
    <?php
    } ?>
    <?php
    $di_us_exploratoria = $protocolo['laudosDiUsExploratoria'];
    if ($di_us_exploratoria) {
    ?>
        <table id="header" class="table-responsive table table-striped">
            <!-- code -->
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Veterinário:</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Proprietário:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
            </tr>
        </table>
        <table id="body" class="table-responsive table table-striped">
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
        <table id="footer" class="table-responsive table table-striped">
            <!-- code -->
        </table>
    <?php
    } ?>
    <?php
    $di_us_gestacional = $protocolo['laudosDiUsGestacional'];
    if ($di_us_gestacional) {
    ?>
        <table id="header" class="table-responsive table table-striped">
            <!-- code -->
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Veterinário:</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Proprietário:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
            </tr>
        </table>
        <table id="body" class="table-responsive table table-striped">
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
        <table id="footer" class="table-responsive table table-striped">
            <!-- code -->
        </table>
    <?php
    } ?>
    <?php
    $di_us_obstetrica = $protocolo['laudosDiUsObstetrica'];
    if ($di_us_obstetrica) {
    ?>
        <table id="header" class="table-responsive table table-striped">
            <!-- code -->
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Veterinário:</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Proprietário:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
            </tr>
        </table>
        <table id="body" class="table-responsive table table-striped">
            <!-- code -->
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
        <table id="footer" class="table-responsive table table-striped">
            <!-- code -->
        </table>
    <?php
    } ?>
    <?php
    $di_us_pos_parto = $protocolo['laudosDiUsPosParto'];
    if ($di_us_pos_parto) {
    ?>
        <table id="header" class="table-responsive table table-striped">
            <!-- code -->
            <tr>
                <td width="15%">Clínica:</td>
                <td><?= $model->convenios->titulo; ?></td>
                <td width="15%">Veterinário:</td>
                <td><?= $model->requisitante; ?></td>
            </tr>
            <tr>
                <td width="15%">Paciente:</td>
                <td><?= $model->paciente; ?></td>
                <td width="15%">Proprietário:</td>
                <td><?= $model->proprietario; ?></td>
            </tr>
            <tr>
                <td width="15%">Espécie:</td>
                <td><?= $model->especie; ?></td>
                <td width="15%">Raça:</td>
                <td><?= $model->especie_raca; ?></td>
            </tr>
        </table>
        <table id="body" class="table-responsive table table-striped">
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
        <table id="footer" class="table-responsive table table-striped">
            <!-- code -->
        </table>
    <?php
    } ?>

</div>