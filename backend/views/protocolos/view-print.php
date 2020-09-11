<?php

    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\widgets\DetailView;
    /* @var $this yii\web\View */
    /* @var $model app\modules\secretaria\models\Protocolos */

    \yii\web\YiiAsset::register($this);
    //
    use backend\models\Protocolos;
    //
    $query = (new \yii\db\Query())
    ->from('protocolos')
    ->select(['id','motedepass'])
    ->orderBy(['id' => SORT_DESC,])
    ->indexBy('id');

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
    // Variável para exibir se há ou não laudos para impressão
    $readyToPrint = 0;
    //
    $this->title = "Impressão do Protocolo: " . $model->username;
    $this->params['breadcrumbs'][] = ['label' => 'Laudos', 'url' => ['/protocolos/index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="protocolos-view">
<?php
    $apCitopatologia = $protocolo['laudosApCitopatologia'];
    if ($apCitopatologia) {
        $readyToPrint = 1;
    ?>
    <section class="sheet padding-10mm">
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
        <table id="footer" class="table-responsive table table-striped">
            <tr>
                <td class="text-center">
                    <strong>
                        <?php echo 'Curitiba, ' . Yii::$app->formatter->asDate(date("Y-M-d"));?>
                    </strong>
                </td>
            </tr>
        </table>
    </section>
    <?php
    }
    //
    $apCitopatologiaVaginal = $protocolo['laudosApCitopatologiaVaginal'];
    if ($apCitopatologiaVaginal) {
        $readyToPrint = 1;
    ?>
    <section class="sheet padding-10mm">
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
        <table id="footer" class="table-responsive table table-striped">
            <tr>
                <td class="text-center">
                    <strong>Curitiba <?= Yii::$app->formatter->asDate(date("Y-M-d"));?></strong>
                </td>
            </tr>
        </table>
    </section>
    <?php
    }
    //
    $apHistopatologia = $protocolo['laudosApHistopatologia'];
    if ($apHistopatologia) {
        $readyToPrint = 1;
    ?>
    <section class="sheet padding-10mm">
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
        <table id="footer" class="table-responsive table table-striped">
            <tr>
                <td class="text-center">
                    <strong>Curitiba <?= Yii::$app->formatter->asDate(date("Y-M-d"));?></strong>
                </td>
            </tr>
        </table>
    </section>
    <?php
    }
    //
    $di_endoscopia = $protocolo['laudosDiEndoscopia'];
    if ($di_endoscopia) {
        $readyToPrint = 1;
    ?>
    <section class="sheet padding-10mm">
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
            <tr>
                <td class="text-center">
                    <strong>Curitiba <?= Yii::$app->formatter->asDate(date("Y-M-d"));?></strong>
                </td>
            </tr>
        </table>
    </section>
    <?php
    }
    //
    $di_raio_x = $protocolo['laudosDiRaioX'];
    if ($di_raio_x) {
        $readyToPrint = 1;
    ?>
    <section class="sheet padding-10mm">
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
        <table id="footer" class="table-responsive table table-striped">
            <tr>
                <td class="text-center">
                    <strong>Curitiba <?= Yii::$app->formatter->asDate(date("Y-M-d"));?></strong>
                </td>
            </tr>
        </table>
    </section>
    <?php
    }
    //
    $di_raio_x_contrastado = $protocolo['laudosDiRaioXContrastado'];
    if ($di_raio_x_contrastado) {
        $readyToPrint = 1;
    ?>
    <section class="sheet padding-10mm">
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
            <tr>
                <td class="text-center">
                    <strong>Curitiba <?= Yii::$app->formatter->asDate(date("Y-M-d"));?></strong>
                </td>
            </tr>
        </table>
    </section>
    <?php
    }
    //
    $di_us_aparelho_feminino = $protocolo['laudosDiUsAparelhoFeminino'];
    if ($di_us_aparelho_feminino) {
        $readyToPrint = 1;
    ?>
    <section class="sheet padding-10mm">
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
    </section>
    <?php
    }
    //
    $di_us_estrutura = $protocolo['laudosDiUsEstrutura'];
    if ($di_us_estrutura) {
        $readyToPrint = 1;
    ?>
    <section class="sheet padding-10mm">
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
            <tr>
                <td class="text-center">
                    <strong>Curitiba <?= Yii::$app->formatter->asDate(date("Y-M-d"));?></strong>
                </td>
            </tr>
        </table>
    </section>
    <?php
    }
    //
    $di_us_exploratoria = $protocolo['laudosDiUsExploratoria'];
    if ($di_us_exploratoria) {
        $readyToPrint = 1;
    ?>
    <section class="sheet padding-10mm">
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
            <tr>
                <td class="text-center">
                    <strong>Curitiba <?= Yii::$app->formatter->asDate(date("Y-M-d"));?></strong>
                </td>
            </tr>
        </table>
    </section>
    <?php
    }
    //
    $di_us_gestacional = $protocolo['laudosDiUsGestacional'];
    if ($di_us_gestacional) {
        $readyToPrint = 1;
    ?>
    <section class="sheet padding-10mm">
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
            <tr>
                <td class="text-center">
                    <strong>Curitiba <?= Yii::$app->formatter->asDate(date("Y-M-d"));?></strong>
                </td>
            </tr>
        </table>
    </section>
    <?php
    }
    //
    $di_us_obstetrica = $protocolo['laudosDiUsObstetrica'];
    if ($di_us_obstetrica) {
        $readyToPrint = 1;
    ?>
    <section class="sheet padding-10mm">
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
            <tr>
                <td class="text-center">
                    <strong>Curitiba <?= Yii::$app->formatter->asDate(date("Y-M-d"));?></strong>
                </td>
            </tr>
        </table>
    </section>
    <?php
    }
    //
    $di_us_pos_parto = $protocolo['laudosDiUsPosParto'];
    if ($di_us_pos_parto) {
        $readyToPrint = 1;
    ?>
    <section class="sheet padding-10mm">
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
            <tr>
                <td class="text-center">
                    <strong>Curitiba <?= Yii::$app->formatter->asDate(date("Y-M-d"));?></strong>
                </td>
            </tr>
        </table>
    </section>
    <?php
    }
    if($readyToPrint){
        $this->params['breadcrumbs'][] = ['label' => 'Imprimir Laudos', 'url' => ['/protocolos/view-print-reports', 'id' => $model->id]];
    }else{
        $this->params['breadcrumbs'][] = ['label' => 'Sem Laudos para Impressão', 'url' => ['/protocolos/index']];
        ?>
        <div class="row">
            <div class="col-lg-12">
                <h2>Não há laudos para impressão.</h2>
                <h3 style="text-align:center;"><?= Html::a("Voltar", Url::to(Url::to(['protocolos/index'])), ['title' => 'Voltar']);?></h3>
            </div>
        </div>
        <?php
    }
    ?>
</div>