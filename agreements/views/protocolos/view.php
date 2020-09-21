<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model backend\models\Protocolos */
\yii\web\YiiAsset::register($this);
//
use agreements\models\Protocolos;
//
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
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="protocolos-view">
<?php
$apCitopatologia = $protocolo['laudosApCitopatologia'];
if ($apCitopatologia) {
    $readyToPrint = 1;
?>
<section class="sheet padding-5mm">
    <table id="header" class="table table-responsive table-striped">
        <tr>
            <td class="table-header-td" width="15%">Protocolo:</td>
            <td><?= $model->username; ?></td>
            <td class="table-header-td" width="15%">Solicitado:</td>
            <td><?= Yii::$app->formatter->asDate($model->data_cadastro); ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Paciente:</td>
            <td><?= $model->paciente; ?></td>
            <td class="table-header-td" width="15%">Idade:</td>
            <td><?= $model->idade; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Espécie:</td>
            <td><?= $model->especie; ?></td>
            <td class="table-header-td" width="15%">Sexo:</td>
            <td><?= $model->genero; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Raça:</td>
            <td><?= $model->especie_raca; ?></td>
            <td class="table-header-td" width="15%">Tutor:</td>
            <td><?= $model->proprietario; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Clínica:</td>
            <td><?= $model->convenios->titulo; ?></td>
            <td class="table-header-td" width="15%">Dr(a):</td>
            <td><?= $model->requisitante; ?></td>
        </tr>
    </table>
    <table id="body" class="table table-responsive table-striped">
        <tr>
            <th class="table-body-th-title">Laudo de Citopatologia</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Amostra</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $apCitopatologia->amostra; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Exame</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $apCitopatologia->exame; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Conclusão</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $apCitopatologia->conclusao; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Data do laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= Yii::$app->formatter->asDate($apCitopatologia->concluido); ?></td>
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
<section class="sheet padding-5mm">
    <table id="header" class="table table-responsive table-striped">
        <tr>
            <td class="table-header-td" width="15%">Protocolo:</td>
            <td><?= $model->username; ?></td>
            <td class="table-header-td" width="15%">Solicitado:</td>
            <td><?= Yii::$app->formatter->asDate($model->data_cadastro); ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Paciente:</td>
            <td><?= $model->paciente; ?></td>
            <td class="table-header-td" width="15%">Idade:</td>
            <td><?= $model->idade; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Espécie:</td>
            <td><?= $model->especie; ?></td>
            <td class="table-header-td" width="15%">Sexo:</td>
            <td><?= $model->genero; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Raça:</td>
            <td><?= $model->especie_raca; ?></td>
            <td class="table-header-td" width="15%">Tutor:</td>
            <td><?= $model->proprietario; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Clínica:</td>
            <td><?= $model->convenios->titulo; ?></td>
            <td class="table-header-td" width="15%">Dr(a):</td>
            <td><?= $model->requisitante; ?></td>
        </tr>
    </table>
    <table id="body" class="table table-responsive table-striped">
        <tr>
            <th class="table-body-th-title">Laudo de Citopatologia Vaginal</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Amostra</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $apCitopatologiaVaginal->amostra; ?></td>
        </tr>
        <?php
        if (!empty($apCitopatologiaVaginal->epiteliais_queratinizadas)) {
            ?>
            <tr>
                <td class="table-body-td-title">Células epiteliais queratinizadas</td>
            </tr>
            <tr>
                <td class="table-body-td-result"><?= $apCitopatologiaVaginal->epiteliais_queratinizadas; ?>
                </td>
            </tr>
            <?php
        }
        ?>
        <?php
        if (!empty($apCitopatologiaVaginal->epiteliais_queratinizadas_n)) {
            ?>
            <tr>
                <td class="table-body-td-title">Células epiteliais não queratinizadas</td>
            </tr>
            <tr>
                <td class="table-body-td-result"><?= $apCitopatologiaVaginal->epiteliais_queratinizadas_n; ?>
                </td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td class="table-body-td-title">Eritrocitos</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $apCitopatologiaVaginal->eritrocitos; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Bacterias</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $apCitopatologiaVaginal->bacterias; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Leucocitos</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $apCitopatologiaVaginal->leucocitos; ?></td>
        </tr>
        <?php
        if (!empty($apCitopatologiaVaginal->em_branco)) {
            ?>
            <tr>
                <td class="table-body-td-title"><?= $apCitopatologiaVaginal->em_branco; ?></td>
            </tr>
            <tr>
                <td class="table-body-td-result"><?= $apCitopatologiaVaginal->em_branco_; ?>
                </td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td class="table-body-td-title">Diagnóstico</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $apCitopatologiaVaginal->diagnostico; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Data do laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $apCitopatologiaVaginal->concluido; ?></td>
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
<section class="sheet padding-5mm">
    <table id="header" class="table table-responsive table-striped">
        <tr>
            <td class="table-header-td" width="15%">Protocolo:</td>
            <td><?= $model->username; ?></td>
            <td class="table-header-td" width="15%">Solicitado:</td>
            <td><?= Yii::$app->formatter->asDate($model->data_cadastro); ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Paciente:</td>
            <td><?= $model->paciente; ?></td>
            <td class="table-header-td" width="15%">Idade:</td>
            <td><?= $model->idade; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Espécie:</td>
            <td><?= $model->especie; ?></td>
            <td class="table-header-td" width="15%">Sexo:</td>
            <td><?= $model->genero; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Raça:</td>
            <td><?= $model->especie_raca; ?></td>
            <td class="table-header-td" width="15%">Tutor:</td>
            <td><?= $model->proprietario; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Clínica:</td>
            <td><?= $model->convenios->titulo; ?></td>
            <td class="table-header-td" width="15%">Dr(a):</td>
            <td><?= $model->requisitante; ?></td>
        </tr>
    </table>
    <table id="body" class="table table-responsive table-striped">
        <tr>
            <th class="table-body-th-title">Laudo de Histopatologia</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Amostra</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $apHistopatologia->amostra; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Exame</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $apHistopatologia->exame; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Conclusão</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $apHistopatologia->conclusao; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Data do laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= Yii::$app->formatter->asDate($apHistopatologia->concluido); ?></td>
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
<section class="sheet padding-5mm">
    <table id="header" class="table table-responsive table-striped">
        <tr>
            <td class="table-header-td" width="15%">Protocolo:</td>
            <td><?= $model->username; ?></td>
            <td class="table-header-td" width="15%">Solicitado:</td>
            <td><?= Yii::$app->formatter->asDate($model->data_cadastro); ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Paciente:</td>
            <td><?= $model->paciente; ?></td>
            <td class="table-header-td" width="15%">Idade:</td>
            <td><?= $model->idade; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Espécie:</td>
            <td><?= $model->especie; ?></td>
            <td class="table-header-td" width="15%">Sexo:</td>
            <td><?= $model->genero; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Raça:</td>
            <td><?= $model->especie_raca; ?></td>
            <td class="table-header-td" width="15%">Tutor:</td>
            <td><?= $model->proprietario; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Clínica:</td>
            <td><?= $model->convenios->titulo; ?></td>
            <td class="table-header-td" width="15%">Dr(a):</td>
            <td><?= $model->requisitante; ?></td>
        </tr>
    </table>
    <table id="body" class="table table-responsive table-striped">
        <tr>
            <th class="table-body-th-title">Laudo de Endoscopia</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Local</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $di_endoscopia->local; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Comentário</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $di_endoscopia->comentario; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Interpretação</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $di_endoscopia->interpretacao; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Conclusão</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $di_endoscopia->conclusao; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Data do laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $di_endoscopia->concluido; ?></td>
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
<section class="sheet padding-5mm">
    <table id="header" class="table table-responsive">
        <tr>
            <td class="table-header-td" width="15%">Protocolo:</td>
            <td><?= $model->username; ?></td>
            <td class="table-header-td" width="15%">Solicitado:</td>
            <td><?= Yii::$app->formatter->asDate($model->data_cadastro); ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Paciente:</td>
            <td><?= $model->paciente; ?></td>
            <td class="table-header-td" width="15%">Idade:</td>
            <td><?= $model->idade; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Espécie:</td>
            <td><?= $model->especie; ?></td>
            <td class="table-header-td" width="15%">Sexo:</td>
            <td><?= $model->genero; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Raça:</td>
            <td><?= $model->especie_raca; ?></td>
            <td class="table-header-td" width="15%">Tutor:</td>
            <td><?= $model->proprietario; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Clínica:</td>
            <td><?= $model->convenios->titulo; ?></td>
            <td class="table-header-td" width="15%">Dr(a):</td>
            <td><?= $model->requisitante; ?></td>
        </tr>
    </table>
    <table id="body" class="table table-responsive table-striped">
        <tr>
            <th class="table-body-th-title">Laudo de Raio-x</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Região:</td>
        </tr>
        <tr>
            <td style="text-indent: 20px;text-align: justify;">
                <?= $di_raio_x['regiao']; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Descrição:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $di_raio_x['descricao']; ?></td>
        </tr>
        <?php
        if (!empty($di_raio_x['interpretacao'])) {
        ?>
            <tr><td class="table-body-td-title">Interpretação:</td>
            </tr>
            <tr>
                <td class="table-body-td-result"><?= $di_raio_x['interpretacao']; ?></td>
            </tr>
        <?php
        }
        if (!empty($di_raio_x['observacao'])) {
        ?>
            <tr>
                <td class="table-body-td-title">Observação:</td>
            </tr>
            <tr>
                <td class="table-body-td-result"><?= $di_raio_x['observacao']; ?></td>
            </tr>
        <?php
        } ?>
        <tr>
            <td class="table-body-td-title">Data do Laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= Yii::$app->formatter->asDate($di_raio_x['concluido']); ?></td>
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
<section class="sheet padding-5mm">
    <table id="header" class="table table-responsive table-striped">
        <tr>
            <td class="table-header-td" width="15%">Protocolo:</td>
            <td><?= $model->username; ?></td>
            <td class="table-header-td" width="15%">Solicitado:</td>
            <td><?= Yii::$app->formatter->asDate($model->data_cadastro); ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Paciente:</td>
            <td><?= $model->paciente; ?></td>
            <td class="table-header-td" width="15%">Idade:</td>
            <td><?= $model->idade; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Espécie:</td>
            <td><?= $model->especie; ?></td>
            <td class="table-header-td" width="15%">Sexo:</td>
            <td><?= $model->genero; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Raça:</td>
            <td><?= $model->especie_raca; ?></td>
            <td class="table-header-td" width="15%">Tutor:</td>
            <td><?= $model->proprietario; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Clínica:</td>
            <td><?= $model->convenios->titulo; ?></td>
            <td class="table-header-td" width="15%">Dr(a):</td>
            <td><?= $model->requisitante; ?></td>
        </tr>
    </table>
    <table id="body" class="table table-responsive table-striped">
        <tr>
            <th class="table-body-th-title">Laudo de Raio-x Contrastado</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Técnica:</td>
        </tr>
        <tr>
            <td style="text-indent: 20px;text-align: justify;">
                <?= $di_raio_x_contrastado['tecnica']; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Descrição:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $di_raio_x_contrastado['descricao']; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Interpretação:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $di_raio_x_contrastado['interpretacao']; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Observação:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $di_raio_x_contrastado['observacao']; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Data do Laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= Yii::$app->formatter->asDate($di_raio_x_contrastado['concluido']); ?></td>
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
<section class="sheet padding-5mm">
    <table id="header" class="table table-responsive table-striped">
        <tr>
            <td class="table-header-td" width="15%">Protocolo:</td>
            <td><?= $model->username; ?></td>
            <td class="table-header-td" width="15%">Solicitado:</td>
            <td><?= Yii::$app->formatter->asDate($model->data_cadastro); ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Paciente:</td>
            <td><?= $model->paciente; ?></td>
            <td class="table-header-td" width="15%">Idade:</td>
            <td><?= $model->idade; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Espécie:</td>
            <td><?= $model->especie; ?></td>
            <td class="table-header-td" width="15%">Sexo:</td>
            <td><?= $model->genero; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Raça:</td>
            <td><?= $model->especie_raca; ?></td>
            <td class="table-header-td" width="15%">Tutor:</td>
            <td><?= $model->proprietario; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Clínica:</td>
            <td><?= $model->convenios->titulo; ?></td>
            <td class="table-header-td" width="15%">Dr(a):</td>
            <td><?= $model->requisitante; ?></td>
        </tr>
    </table>
    <table id="body" class="table table-responsive table-striped">
        <tr>
            <th class="table-body-th-title">Laudo de Ultrassonografia Aparelho Feminino</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Descrição:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $di_us_aparelho_feminino['descricao']; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Data do Laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= Yii::$app->formatter->asDate($di_us_aparelho_feminino['concluido']); ?></td>
        </tr>
    </table>
</section>
<?php
}
//
$di_us_estrutura = $protocolo['laudosDiUsEstrutura'];
if ($di_us_estrutura) {
    $readyToPrint = 1;
?>
<section class="sheet padding-5mm">
    <table id="header" class="table table-responsive table-striped">
        <tr>
            <td class="table-header-td" width="15%">Protocolo:</td>
            <td><?= $model->username; ?></td>
            <td class="table-header-td" width="15%">Solicitado:</td>
            <td><?= Yii::$app->formatter->asDate($model->data_cadastro); ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Paciente:</td>
            <td><?= $model->paciente; ?></td>
            <td class="table-header-td" width="15%">Idade:</td>
            <td><?= $model->idade; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Espécie:</td>
            <td><?= $model->especie; ?></td>
            <td class="table-header-td" width="15%">Sexo:</td>
            <td><?= $model->genero; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Raça:</td>
            <td><?= $model->especie_raca; ?></td>
            <td class="table-header-td" width="15%">Tutor:</td>
            <td><?= $model->proprietario; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Clínica:</td>
            <td><?= $model->convenios->titulo; ?></td>
            <td class="table-header-td" width="15%">Dr(a):</td>
            <td><?= $model->requisitante; ?></td>
        </tr>
    </table>
    <table id="body" class="table table-responsive table-striped">
        <tr>
            <th class="table-body-th-title">Laudo de Ultrassonografia de Estruturas</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Local:</td>
        </tr>
        <tr>
            <td style="text-indent: 20px;text-align: justify;">
                <?= $di_us_estrutura['local']; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Descrição:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $di_us_estrutura['descricao']; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Data do Laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= Yii::$app->formatter->asDate($di_us_estrutura['concluido']); ?></td>
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
<section class="sheet padding-5mm">
    <table id="header" class="table table-responsive table-striped">
        <tr>
            <td class="table-header-td" width="15%">Protocolo:</td>
            <td><?= $model->username; ?></td>
            <td class="table-header-td" width="15%">Solicitado:</td>
            <td><?= Yii::$app->formatter->asDate($model->data_cadastro); ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Paciente:</td>
            <td><?= $model->paciente; ?></td>
            <td class="table-header-td" width="15%">Idade:</td>
            <td><?= $model->idade; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Espécie:</td>
            <td><?= $model->especie; ?></td>
            <td class="table-header-td" width="15%">Sexo:</td>
            <td><?= $model->genero; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Raça:</td>
            <td><?= $model->especie_raca; ?></td>
            <td class="table-header-td" width="15%">Tutor:</td>
            <td><?= $model->proprietario; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Clínica:</td>
            <td><?= $model->convenios->titulo; ?></td>
            <td class="table-header-td" width="15%">Dr(a):</td>
            <td><?= $model->requisitante; ?></td>
        </tr>
    </table>
    <table id="body" class="table table-responsive table-striped">
        <tr>
            <th class="table-body-th-title">Laudo de Ultrassonografia Exploratória</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Descrição:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $di_us_exploratoria['descricao']; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Data do Laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= Yii::$app->formatter->asDate($di_us_exploratoria['concluido']); ?></td>
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
<section class="sheet padding-5mm">
    <table id="header" class="table table-responsive table-striped">
        <tr>
            <td class="table-header-td" width="15%">Protocolo:</td>
            <td><?= $model->username; ?></td>
            <td class="table-header-td" width="15%">Solicitado:</td>
            <td><?= Yii::$app->formatter->asDate($model->data_cadastro); ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Paciente:</td>
            <td><?= $model->paciente; ?></td>
            <td class="table-header-td" width="15%">Idade:</td>
            <td><?= $model->idade; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Espécie:</td>
            <td><?= $model->especie; ?></td>
            <td class="table-header-td" width="15%">Sexo:</td>
            <td><?= $model->genero; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Raça:</td>
            <td><?= $model->especie_raca; ?></td>
            <td class="table-header-td" width="15%">Tutor:</td>
            <td><?= $model->proprietario; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Clínica:</td>
            <td><?= $model->convenios->titulo; ?></td>
            <td class="table-header-td" width="15%">Dr(a):</td>
            <td><?= $model->requisitante; ?></td>
        </tr>
    </table>
    <table id="body" class="table table-responsive table-striped">
        <tr>
            <th class="table-body-th-title">Laudo de Ultrassonografia Gestacional</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Descrição:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $di_us_gestacional['descricao']; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Data do Laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= Yii::$app->formatter->asDate($di_us_gestacional['concluido']); ?></td>
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
<section class="sheet padding-5mm">
    <table id="header" class="table table-responsive table-striped">
        <tr>
            <td class="table-header-td" width="15%">Protocolo:</td>
            <td><?= $model->username; ?></td>
            <td class="table-header-td" width="15%">Solicitado:</td>
            <td><?= Yii::$app->formatter->asDate($model->data_cadastro); ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Paciente:</td>
            <td><?= $model->paciente; ?></td>
            <td class="table-header-td" width="15%">Idade:</td>
            <td><?= $model->idade; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Espécie:</td>
            <td><?= $model->especie; ?></td>
            <td class="table-header-td" width="15%">Sexo:</td>
            <td><?= $model->genero; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Raça:</td>
            <td><?= $model->especie_raca; ?></td>
            <td class="table-header-td" width="15%">Tutor:</td>
            <td><?= $model->proprietario; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Clínica:</td>
            <td><?= $model->convenios->titulo; ?></td>
            <td class="table-header-td" width="15%">Dr(a):</td>
            <td><?= $model->requisitante; ?></td>
        </tr>
    </table>
    <table id="body" class="table table-responsive table-striped">
        <tr>
            <th class="table-body-th-title">Laudo de Ultrassonografia Obstétrica</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Descrição:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $di_us_obstetrica['descricao']; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Data do Laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= Yii::$app->formatter->asDate($di_us_obstetrica['concluido']); ?></td>
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
<section class="sheet padding-5mm">
    <table id="header" class="table table-responsive table-striped">
        <tr>
            <td class="table-header-td" width="15%">Protocolo:</td>
            <td><?= $model->username; ?></td>
            <td class="table-header-td" width="15%">Solicitado:</td>
            <td><?= Yii::$app->formatter->asDate($model->data_cadastro); ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Paciente:</td>
            <td><?= $model->paciente; ?></td>
            <td class="table-header-td" width="15%">Idade:</td>
            <td><?= $model->idade; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Espécie:</td>
            <td><?= $model->especie; ?></td>
            <td class="table-header-td" width="15%">Sexo:</td>
            <td><?= $model->genero; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Raça:</td>
            <td><?= $model->especie_raca; ?></td>
            <td class="table-header-td" width="15%">Tutor:</td>
            <td><?= $model->proprietario; ?></td>
        </tr>
        <tr>
            <td class="table-header-td" width="15%">Clínica:</td>
            <td><?= $model->convenios->titulo; ?></td>
            <td class="table-header-td" width="15%">Dr(a):</td>
            <td><?= $model->requisitante; ?></td>
        </tr>
    </table>
    <table id="body" class="table table-responsive table-striped">
        <tr>
            <th class="table-body-th-title">Laudo de Ultrassonografia Pós Parto</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Descrição:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= $di_us_pos_parto['descricao']; ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Data do Laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= Yii::$app->formatter->asDate($di_us_pos_parto['concluido']); ?></td>
        </tr>
    </table>
</section>
<?php
}
if($readyToPrint){
    $this->params['breadcrumbs'][] = [
        'label' => 'Imprimir', 
        'url' => ['/protocolos/pet-imagem-diagnosticos-veterinarios', 'id' => $model->id],
        'options' => [ 'target' => '_blank' ]
    ];
}else{
    $this->params['breadcrumbs'][] = ['label' => 'Sem Laudos para Impressão', 'url' => ['/protocolos/index']];
    ?>
    <div class="jumbotron text-center">
        <h2>Em breve o laudo solicitado estará disponível.</h2>
        <br>
        <br>
        <h2>Não há laudos para impressão.</h2>
        <br>
        <br>
        <br>
        <p class="lead">
            <h3><?= Html::a("Voltar", Url::to(Url::to(['protocolos/index'])), ['title' => 'Voltar']);?></h3>
        </p>
    </div>
    <?php
}
?>
</div>