<?php

use yii\helpers\Html;
/* use yii\helpers\Url; */
use yii\widgets\DetailView;
/* use yii\bootstrap\Modal; */

/* @var $this yii\web\View */
/* @var $model agreements\models\Convenios */

$this->title = "Clínica/Consultório: " . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Convenios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="convenios-view">
    
    <!-- Button trigger modal -->
    <button type="button" href="update?id=<?= $model->id; ?>" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Atualizar dados
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-2"><strong>Clínica/Consultório</strong></div>
        <div class="col-sm-4"><?= $model->titulo;?></div>
        <div class="col-sm-2"><strong>Proprietário</strong></div>
        <div class="col-sm-4"><?= $model->username;?></div>
    </div>
    <div class="row">
        <div class="col-sm-2"><strong>E-mail</strong></div>
        <div class="col-sm-4 text-center text-uppercase btn-success" style="letter-spacing:2px;font-weight:bold;"><?= $model->email;?></div>
        <div class="col-sm-2"><strong>Senha</strong></div>
        <div class="col-sm-4 text-center text-uppercase btn-danger" style="letter-spacing:2px;font-weight:bold;"><?= $model->senha;?></div>
    </div>
    <div class="row">
        <div class="col-sm-2">Telefone</div>
        <div class="col-sm-4"><?= $model->telefone; ?></div>
        <div class="col-sm-2">Celular</div>
        <div class="col-sm-4"><?= $model->celular; ?></div>
    </div>
    <div class="row">
        <div class="col-sm-12"><strong>CEP</strong></div>
        <div class="col-sm-12"><?= $model->cep; ?></div>
    </div>
    <div class="row">
        <div class="col-sm-2"><strong>Endereço</strong></div>
        <div class="col-sm-4"><?= $model->endereco; ?></div>
        <div class="col-sm-2"><strong>Número</strong></div>
        <div class="col-sm-4"><?= $model->endereco_numero; ?></div>
    </div>
    <div class="row">
        <div class="col-sm-2"><strong>Complemento</strong></div>
        <div class="col-sm-4"><?= $model->endereco_complemento; ?></div>
        <div class="col-sm-2"><strong>Bairro</strong></div>
        <div class="col-sm-4"><?= $model->bairro; ?></div>
    </div>
    <div class="row">
        <div class="col-sm-2"><strong>Cidade</strong></div>
        <div class="col-sm-4"><?= $model->cidade; ?></div>
        <div class="col-sm-2"><strong>Estado</strong></div>
        <div class="col-sm-4"><?= $model->uf; ?></div>
    </div>
    <div class="row">
        <div class="col-sm-2"><strong>Cadastrada</strong></div>
        <div class="col-sm-4"><?= Yii::$app->formatter->asDate($model->data_cadastro); ?></div>
    </div>
</div>
