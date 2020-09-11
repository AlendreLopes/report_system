<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

//use kartik\editable\Editable;
//\yii\web\YiiAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\modules\laudos\models\Protocolos */

$this->title = "Protocolo: " . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Laudos', 'url' => ['/protocolos/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="protocolos-view">

    <?php echo $this->render('@app/views/laudos-menu/menuCadastro'); ?>

    <h3>
        Cadastar Laudos: <?php echo $model->username; ?>
        <?= Html::a(Yii::t('app', 'Cancel'), ['protocolos/index'], ['class' => 'btn btn-warning', 'style' => 'float:right;']) ?>
    </h3>
    <table class="table-responsive table table-striped">
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
    <!-- Editable -->
    <?php
    /*
    echo Editable::widget([
        'model' => $model,
        'attribute' => 'requisitante',
        'type' => 'primary',
        'size' => 'lg',
        'inputType' => Editable::INPUT_TEXT,
        'editableValueOptions' => ['class' => 'text-success h5']
    ]);
    */
    ?>
</div>