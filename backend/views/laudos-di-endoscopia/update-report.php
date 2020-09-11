<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\LaudosDiEndoscopia */

$this->title = 'Atualizar Laudo DI Endoscopia';
$this->params['breadcrumbs'][] = ['label' => 'Laudos', 'url' => ['/protocolos/index']];
$this->params['breadcrumbs'][] = ['label' => 'Laudos DI Endoscopia', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Atualizar';
?>

<div class="laudos-di-endoscopia-update">

    <?php echo $this->render('@app/views/laudos-menu/menuCadastro'); ?>

    <h3>Protocolo: <?= $protocolo->username; ?></h3>

    <table class="table-responsive table table-striped">
        <tr>
            <td width="15%">Clínica:</td>
            <td><?= $protocolo->convenios->titulo; ?></td>
            <td width="15%">Veterinário:</td>
            <td><?= $protocolo->requisitante; ?></td>
        </tr>
        <tr>
            <td width="15%">Paciente:</td>
            <td><?= $protocolo->paciente; ?></td>
            <td width="15%">Proprietário:</td>
            <td><?= $protocolo->proprietario; ?></td>
        </tr>
        <tr>
            <td width="15%">Espécie:</td>
            <td><?= $protocolo->especie; ?></td>
            <td width="15%">Raça:</td>
            <td><?= $protocolo->especie_raca; ?></td>
        </tr>
    </table>

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form_update_report', [
        'model' => $model,
    ]) ?>
    
</div>