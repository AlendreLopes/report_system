<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel owners\models\ProtocolosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Protocolos';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="protocolos-index">
    <h2>Seja bem vindo, proprietário(a)!</h2>
    <h3>Laudo(s) referente ao Protocolo: <strong><?= Yii::$app->user->identity->username; ?></strong></h3>
    <!-- Modal -->
    <div class="modal fade" id="agreementUpdatePass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
    
    <?php Pjax::begin(); ?>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tr>
                <th>Protocolo</th>
                <th>Requisitante</th>
                <th>Proprietário</th>
                <th>Paciente</th>
                <th>Idade</th>
                <th>Genero</th>
                <th>Espécie</th>
                <th>Raça</th>
            </tr>
            <?php
                foreach ($protocolos as $protocolo) {
                    ?>
                    <tr>
                        <td>
                            <?= Html::a($protocolo->username, 
                            Url::to(['protocolos/view', 'id' => $protocolo->id]), 
                            [
                                'title' => 'Visualizar Laudo'
                            ]);?>
                        </td>
                        <td><?= $protocolo->requisitante;?></td>
                        <td><?= $protocolo->proprietario;?></td>
                        <td><?= $protocolo->paciente;?></td>
                        <td><?= $protocolo->idade;?></td>
                        <td><?= $protocolo->genero;?></td>
                        <td><?= $protocolo->especie;?></td>
                        <td><?= $protocolo->especie_raca;?></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
    <?= LinkPager::widget(['pagination' => $paginacao]);?>
    <?php Pjax::end(); ?>
</div>
