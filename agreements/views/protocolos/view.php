<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\modules\secretaria\models\Protocolos */
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
    'laudosApNecropsia',
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
$pageBreakAfter   = 0;
// Noobisse, mas para evitar a próxima página, neste caso vazia, até ser
//feita a class de impressão
$apCitopatologia = $protocolo['laudosApCitopatologia'];
if ($apCitopatologia) {
    $pageBreakAfter   = 1;
}
$apCitopatologiaVaginal = $protocolo['laudosApCitopatologiaVaginal'];
if ($apCitopatologiaVaginal) {
    $pageBreakAfter   = 2;
}
$apHistopatologia = $protocolo['laudosApHistopatologia'];
if ($apHistopatologia) {
    $pageBreakAfter   = 3;
}
$apNecropsia = $protocolo['laudosApNecropsia'];
if ($apNecropsia) {
    $pageBreakAfter   = 4;
}
$di_endoscopia = $protocolo['laudosDiEndoscopia'];
if ($di_endoscopia) {
    $pageBreakAfter   = 5;
}
$di_raio_x = $protocolo['laudosDiRaioX'];
if ($di_raio_x) {
    $pageBreakAfter   = 6;
}
$di_raio_x_contrastado = $protocolo['laudosDiRaioXContrastado'];
if ($di_raio_x_contrastado) {
    $pageBreakAfter   = 7;
}
$di_us_aparelho_feminino = $protocolo['laudosDiUsAparelhoFeminino'];
if ($di_us_aparelho_feminino) {
    $pageBreakAfter   = 8;
}
$di_us_estrutura = $protocolo['laudosDiUsEstrutura'];
if ($di_us_estrutura) {
    $pageBreakAfter   = 9;
}
$di_us_exploratoria = $protocolo['laudosDiUsExploratoria'];
if ($di_us_exploratoria) {
    $pageBreakAfter   = 10;
}
$di_us_gestacional = $protocolo['laudosDiUsGestacional'];
if ($di_us_gestacional) {
    $pageBreakAfter   = 11;
}
$di_us_obstetrica = $protocolo['laudosDiUsObstetrica'];
if ($di_us_obstetrica) {
    $pageBreakAfter   = 12;
}
$di_us_pos_parto = $protocolo['laudosDiUsPosParto'];
if ($di_us_pos_parto) {
    $pageBreakAfter   = 13;
}
//
$this->title = "Impressão do Protocolo: " . $model->username;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="protocolos-view">
<?php
if ($apCitopatologia) {
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
    <?php
    if ($pageBreakAfter > 1) {
    ?><table id="body" class="table table-responsive next-page-break-after"><?php
    } else {
    ?><table id="body" class="table table-responsive"><?php
    }
    ?>
        <tr>
            <th class="table-body-th-title">Laudo de Citopatologia</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Amostra</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($apCitopatologia->amostra); ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Exame</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($apCitopatologia->exame); ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Conclusão</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($apCitopatologia->conclusao); ?></td>
        </tr>
        <!-- <tr>
            <td class="table-body-td-title">Data do laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?php //= Yii::$app->formatter->asDate($apCitopatologia->concluido); ?></td>
        </tr> -->
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-signature pull-right">
                <?php echo Html::img(Yii::getAlias('@uploads').'/imgs_print_signature/veterinaria_danielle.jpg', 
                [
                    'class' => 'img-responsive',
                    'alt'   => 'Dr(a) Danielle Tullio Murad',
                    'width' => '150',
                    'height' => '120',
                ]); ?>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-aviso">
                &ldquo;O presente resultado tem seu valor restrito à amostra examinada neste laboratório .&rdquo;
            </td>
        </tr>
    </table>

</section>
<?php
}
//
if ($apCitopatologiaVaginal) {
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
    <?php
    if ($pageBreakAfter > 2) {
    ?><table id="body" class="table table-responsive next-page-break-after"><?php
    } else {
    ?><table id="body" class="table table-responsive"><?php
    }
    ?>
        <tr>
            <th class="table-body-th-title">Laudo de Citopatologia Vaginal</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Amostra</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($apCitopatologiaVaginal->amostra); ?></td>
        </tr>
        <?php
        if (!empty($apCitopatologiaVaginal->epiteliais_queratinizadas)) {
            ?>
            <tr>
                <td class="table-body-td-title">Células epiteliais queratinizadas</td>
            </tr>
            <tr>
                <td class="table-body-td-result"><?= nl2br($apCitopatologiaVaginal->epiteliais_queratinizadas); ?></td>
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
                <td class="table-body-td-result"><?= nl2br($apCitopatologiaVaginal->epiteliais_queratinizadas_n); ?></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td class="table-body-td-title">Eritrocitos</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($apCitopatologiaVaginal->eritrocitos); ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Bacterias</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($apCitopatologiaVaginal->bacterias); ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Leucocitos</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($apCitopatologiaVaginal->leucocitos); ?></td>
        </tr>
        <?php
        if (!empty($apCitopatologiaVaginal->em_branco)) {
            ?>
            <tr>
                <td class="table-body-td-title"><?= nl2br($apCitopatologiaVaginal->em_branco); ?></td>
            </tr>
            <tr>
                <td class="table-body-td-result"><?= nl2br($apCitopatologiaVaginal->em_branco_); ?></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td class="table-body-td-title">Diagnóstico</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($apCitopatologiaVaginal->diagnostico); ?></td>
        </tr>
        <!-- <tr>
            <td class="table-body-td-title">Data do laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?php //= $apCitopatologiaVaginal->concluido; ?></td>
        </tr> -->
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-signature pull-right">
                <?php echo Html::img(Yii::getAlias('@uploads').'/imgs_print_signature/veterinaria_danielle.jpg', 
                [
                    'class' => 'img-responsive',
                    'alt'   => 'Dr(a) Danielle Tullio Murad',
                    'width' => '150',
                    'height' => '120',
                ]); ?>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-aviso">
                &ldquo;O presente resultado tem seu valor restrito à amostra examinada neste laboratório .&rdquo;
            </td>
        </tr>
    </table>
</section>
<?php
}
//
if ($apHistopatologia) {
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
    <?php
    if ($pageBreakAfter > 3) {
    ?><table id="body" class="table table-responsive next-page-break-after"><?php
    } else {
    ?><table id="body" class="table table-responsive"><?php
    }
    ?>
        <tr>
            <th class="table-body-th-title">Laudo de Histopatologia</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Amostra</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($apHistopatologia->amostra); ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Exame</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($apHistopatologia->exame); ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Conclusão</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($apHistopatologia->conclusao); ?></td>
        </tr>
        <!-- <tr>
            <td class="table-body-td-title">Data do laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?php //= Yii::$app->formatter->asDate($apHistopatologia->concluido); ?></td>
        </tr> -->
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-signature pull-right">
                <?php echo Html::img(Yii::getAlias('@uploads').'/imgs_print_signature/veterinaria_danielle.jpg', 
                [
                    'class' => 'img-responsive',
                    'alt'   => 'Dr(a) Danielle Tullio Murad',
                    'width' => '150',
                    'height' => '120',
                ]); ?>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-aviso">
                &ldquo;O presente resultado tem seu valor restrito à amostra examinada neste laboratório .&rdquo;
            </td>
        </tr>
    </table>
</section>
<?php
}
//
if ($apNecropsia) {
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
    <?php
    if ( 4) {
    ?><table id="body" class="table table-responsive next-page-break-after"><?php
    } else {
    ?><table id="body" class="table table-responsive"><?php
    }
    ?>
        <tr>
            <th class="table-body-th-title">Laudo de Necropsia</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Amostra</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($apNecropsia->amostra); ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Exame</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($apNecropsia->exame); ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Conclusão</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($apNecropsia->conclusao); ?></td>
        </tr>
        <!-- <tr>
            <td class="table-body-td-title">Data do laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?php //= Yii::$app->formatter->asDate($apNecropsia->concluido); ?></td>
        </tr> -->
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-signature pull-right">
                <?php echo Html::img(Yii::getAlias('@uploads').'/imgs_print_signature/veterinaria_danielle.jpg', 
                [
                    'class' => 'img-responsive',
                    'alt'   => 'Dr(a) Danielle Tullio Murad',
                    'width' => '150',
                    'height' => '120',
                ]); ?>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-aviso">
                &ldquo;O presente resultado tem seu valor restrito à amostra examinada neste laboratório .&rdquo;
            </td>
        </tr>
    </table>
</section>
<?php
}
//
if ($di_endoscopia) {
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
    <?php
    if ($pageBreakAfter > 5) {
    ?><table id="body" class="table table-responsive next-page-break-after"><?php
    } else {
    ?><table id="body" class="table table-responsive"><?php
    }
    ?>
        <tr>
            <th class="table-body-th-title">Laudo de Endoscopia</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Local</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($di_endoscopia->local); ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Comentário</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($di_endoscopia->comentario); ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Interpretação</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($di_endoscopia->interpretacao); ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Conclusão</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($di_endoscopia->conclusao); ?></td>
        </tr>
        <!-- <tr>
            <td class="table-body-td-title">Data do laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?php //= Yii::$app->formatter->asDate($di_endoscopia->concluido); ?></td>
        </tr> -->
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-signature pull-right">
                <?php echo Html::img(Yii::getAlias('@uploads').'/imgs_print_signature/veterinaria_danielle.jpg', 
                [
                    'class' => 'img-responsive',
                    'alt'   => 'Dr(a) Danielle Tullio Murad',
                    'width' => '150',
                    'height' => '120',
                ]); ?>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-aviso">
            &ldquo;O Resultado do presente LAUDO não configura apresença ou ausência de doença 
            devendo ser correlacionado com demais dados	clínicos e exames complementares pertinentes ao caso.&rdquo;
            </td>
        </tr>
    </table>
</section>
<?php
}
//
if ($di_raio_x) {
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
    <?php
    if ($pageBreakAfter > 6) {
    ?><table id="body" class="table table-responsive next-page-break-after"><?php
    } else {
    ?><table id="body" class="table table-responsive"><?php
    }
    ?>
        <tr>
            <th class="table-body-th-title">Laudo de Raio-x</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Região:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($di_raio_x->regiao); ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Descrição:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($di_raio_x->descricao); ?></td>
        </tr>
        <?php
        if (!empty($di_raio_x->interpretacao)) {
        ?>
            <tr><td class="table-body-td-title">Interpretação:</td>
            </tr>
            <tr>
                <td class="table-body-td-result"><?= nl2br($di_raio_x->interpretacao); ?></td>
            </tr>
        <?php
        }
        if (!empty($di_raio_x->observacao)) {
        ?>
            <tr>
                <td class="table-body-td-title">Observação:</td>
            </tr>
            <tr>
                <td class="table-body-td-result"><?= nl2br($di_raio_x->observacao); ?></td>
            </tr>
        <?php
        } ?>
        <!-- <tr>
            <td class="table-body-td-title">Data do Laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?php //= Yii::$app->formatter->asDate($di_raio_x['concluido']); ?></td>
        </tr> -->
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-signature pull-right">
                <?php echo Html::img(Yii::getAlias('@uploads').'/imgs_print_signature/veterinaria_danielle.jpg', 
                [
                    'class' => 'img-responsive',
                    'alt'   => 'Dr(a) Danielle Tullio Murad',
                    'width' => '150',
                    'height' => '120',
                ]); ?>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-aviso">
                &ldquo;O resultado do presente exame não configura apresença ou ausência de doença devendo ser correlacionado 
                com demais dados clínicos e exames complementares pertinentes ao caso.&rdquo;
            </td>
        </tr>
    </table>
</section>
<?php
}
//
if ($di_raio_x_contrastado) {
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
    <?php
    if ($pageBreakAfter > 7) {
    ?><table id="body" class="table table-responsive next-page-break-after"><?php
    } else {
    ?><table id="body" class="table table-responsive"><?php
    }
    ?>
        <tr>
            <th class="table-body-th-title">Laudo de Raio-x Contrastado</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Técnica:</td>
        </tr>
        <tr>
        <td class="table-body-td-result"><?= nl2br($di_raio_x_contrastado['tecnica']); ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Descrição:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($di_raio_x_contrastado['descricao']); ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Interpretação:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($di_raio_x_contrastado['interpretacao']); ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Observação:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($di_raio_x_contrastado['observacao']); ?></td>
        </tr>
        <!-- <tr>
            <td class="table-body-td-title">Data do Laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?php //= Yii::$app->formatter->asDate($di_raio_x_contrastado['concluido']); ?></td>
        </tr> -->
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-signature pull-right">
                <?php echo Html::img(Yii::getAlias('@uploads').'/imgs_print_signature/veterinaria_danielle.jpg', 
                [
                    'class' => 'img-responsive',
                    'alt'   => 'Dr(a) Danielle Tullio Murad',
                    'width' => '150',
                    'height' => '120',
                ]); ?>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-aviso">
            &ldquo;O resultado do presente exame não configura apresença ou ausência de doença devendo ser correlacionado 
            com demais dados clínicos e exames complementares pertinentes ao caso.&rdquo;
            </td>
        </tr>
    </table>
</section>
<?php
}
//
if ($di_us_aparelho_feminino) {
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
    <?php
    if ($pageBreakAfter > 8) {
    ?><table id="body" class="table table-responsive next-page-break-after"><?php
    } else {
    ?><table id="body" class="table table-responsive"><?php
    }
    ?>
        <tr>
            <th class="table-body-th-title">Laudo de Ultrassonografia Aparelho Feminino</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Descrição:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($di_us_aparelho_feminino['descricao']); ?></td>
        </tr>
        <!-- <tr>
            <td class="table-body-td-title">Data do Laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?php //= Yii::$app->formatter->asDate($di_us_aparelho_feminino['concluido']); ?></td>
        </tr> -->
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-signature pull-right">
                <?php echo Html::img(Yii::getAlias('@uploads').'/imgs_print_signature/veterinaria_danielle.jpg', 
                [
                    'class' => 'img-responsive',
                    'alt'   => 'Dr(a) Danielle Tullio Murad',
                    'width' => '150',
                    'height' => '120',
                ]); ?>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-aviso">
            &ldquo;O resultado do presente exame não configura apresença ou ausência de doença devendo ser correlacionado com demais dados	clínicos e exames complementares pertinentes ao caso.&rdquo;
            </td>
        </tr>
    </table>
</section>
<?php
}
//
if ($di_us_estrutura) {
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
    <?php
    if ($pageBreakAfter > 9) {
    ?><table id="body" class="table table-responsive next-page-break-after"><?php
    } else {
    ?><table id="body" class="table table-responsive"><?php
    }
    ?>
        <tr>
            <th class="table-body-th-title">Laudo de Ultrassonografia de Estruturas</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Local:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($di_us_estrutura['local']); ?></td>
        </tr>
        <tr>
            <td class="table-body-td-title">Descrição:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($di_us_estrutura['descricao']); ?></td>
        </tr>
        <!-- <tr>
            <td class="table-body-td-title">Data do Laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?php //= Yii::$app->formatter->asDate($di_us_estrutura['concluido']); ?></td>
        </tr> -->
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-signature pull-right">
                <?php echo Html::img(Yii::getAlias('@uploads').'/imgs_print_signature/veterinaria_danielle.jpg', 
                [
                    'class' => 'img-responsive',
                    'alt'   => 'Dr(a) Danielle Tullio Murad',
                    'width' => '150',
                    'height' => '120',
                ]); ?>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-aviso">
            &ldquo;O resultado do presente exame não configura apresença ou ausência de doença devendo ser correlacionado 
            com demais dados clínicos e exames complementares pertinentes ao caso.&rdquo;
            </td>
        </tr>
    </table>
</section>
<?php
}
//
if ($di_us_exploratoria) {
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
    <?php
    if ($pageBreakAfter > 10) {
    ?><table id="body" class="table table-responsive next-page-break-after"><?php
    } else {
    ?><table id="body" class="table table-responsive"><?php
    }
    ?>
        <tr>
            <th class="table-body-th-title">Laudo de Ultrassonografia Exploratória</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Descrição:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($di_us_exploratoria['descricao']); ?></td>
        </tr>
        <!-- <tr>
            <td class="table-body-td-title">Data do Laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?php //= Yii::$app->formatter->asDate($di_us_exploratoria['concluido']); ?></td>
        </tr> -->
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-signature pull-right">
                <?php echo Html::img(Yii::getAlias('@uploads').'/imgs_print_signature/veterinaria_danielle.jpg', 
                [
                    'class' => 'img-responsive',
                    'alt'   => 'Dr(a) Danielle Tullio Murad',
                    'width' => '150',
                    'height' => '120',
                ]); ?>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-aviso">
            &ldquo;O resultado do presente exame não configura apresença ou ausência de doença devendo ser correlacionado 
            com demais dados clínicos e exames complementares pertinentes ao caso.&rdquo;
            </td>
        </tr>
    </table>
</section>
<?php
}
//
if ($di_us_gestacional) {
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
    <?php
    if ($pageBreakAfter > 11) {
    ?><table id="body" class="table table-responsive next-page-break-after"><?php
    } else {
    ?><table id="body" class="table table-responsive"><?php
    }
    ?>
        <tr>
            <th class="table-body-th-title">Laudo de Ultrassonografia Gestacional</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Descrição:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($di_us_gestacional['descricao']); ?></td>
        </tr>
        <!-- <tr>
            <td class="table-body-td-title">Data do Laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?php //= Yii::$app->formatter->asDate($di_us_gestacional['concluido']); ?></td>
        </tr> -->
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-signature pull-right">
                <?php echo Html::img(Yii::getAlias('@uploads').'/imgs_print_signature/veterinaria_danielle.jpg', 
                [
                    'class' => 'img-responsive',
                    'alt'   => 'Dr(a) Danielle Tullio Murad',
                    'width' => '150',
                    'height' => '120',
                ]); ?>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-aviso">
            &ldquo;O resultado do presente exame não configura apresença ou ausência de doença devendo ser correlacionado 
            com demais dados clínicos e exames complementares pertinentes ao caso.&rdquo;
            </td>
        </tr>
    </table>
</section>
<?php
}
//
if ($di_us_obstetrica) {
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
    <?php
    if ($pageBreakAfter > 12) {
    ?><table id="body" class="table table-responsive next-page-break-after"><?php
    } else {
    ?><table id="body" class="table table-responsive"><?php
    }
    ?>
        <tr>
            <th class="table-body-th-title">Laudo de Ultrassonografia Obstétrica</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Descrição:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($di_us_obstetrica['descricao']); ?></td>
        </tr>
        <!-- <tr>
            <td class="table-body-td-title">Data do Laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?php //= Yii::$app->formatter->asDate($di_us_obstetrica['concluido']); ?></td>
        </tr> -->
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-signature pull-right">
                <?php echo Html::img(Yii::getAlias('@uploads').'/imgs_print_signature/veterinaria_danielle.jpg', 
                [
                    'class' => 'img-responsive',
                    'alt'   => 'Dr(a) Danielle Tullio Murad',
                    'width' => '150',
                    'height' => '120',
                ]); ?>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-aviso">
            &ldquo;O resultado do presente exame não configura apresença ou ausência de doença devendo ser correlacionado 
            com demais dados clínicos e exames complementares pertinentes ao caso.&rdquo;
            </td>
        </tr>
    </table>
</section>
<?php
}
//
if ($di_us_pos_parto) {
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
    <?php
    if ($pageBreakAfter > 13) {
    ?><table id="body" class="table table-responsive next-page-break-after"><?php
    } else {
    ?><table id="body" class="table table-responsive"><?php
    }
    ?>
        <tr>
            <th class="table-body-th-title">Laudo de Ultrassonografia Pós Parto</th>
        </tr>
        <tr>
            <td class="table-body-td-title">Descrição:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?= nl2br($di_us_pos_parto['descricao']); ?></td>
        </tr>
        <!-- <tr>
            <td class="table-body-td-title">Data do Laudo:</td>
        </tr>
        <tr>
            <td class="table-body-td-result"><?php //= Yii::$app->formatter->asDate($di_us_pos_parto['concluido']); ?></td>
        </tr> -->
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-signature pull-right">
                <?php echo Html::img(Yii::getAlias('@uploads').'/imgs_print_signature/veterinaria_danielle.jpg', 
                [
                    'class' => 'img-responsive',
                    'alt'   => 'Dr(a) Danielle Tullio Murad',
                    'width' => '150',
                    'height' => '120',
                ]); ?>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="table-body-td-aviso">
            &ldquo;O resultado do presente exame não configura apresença ou ausência de doença devendo ser 
            correlacionado com demais dados 
            clínicos e exames complementares pertinentes ao caso.&rdquo;
            </td>
        </tr>
</table>
</section>
<?php
}
if($pageBreakAfter){
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