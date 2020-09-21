<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Entrar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h2 class="text-center">
        Sejam bem vindos à nova área de acesso aos:
        <br>
        <span class="text-uppercase">
            <strong>Laudos do Pet Imagem | Diagnóstios por Imagem</strong>
        </span>
    </h2>
    <div class="row">
        <div class="col-sm-7">
            <h1 class="text-center bg-danger">Regras de acesso</h1>
            <h4 class="text-justify">
                <strong>Caro Conveniado o sistema de acesso ao [ Sistema de Laudos ]</strong> foi previmente alterado pela nossa equipe de TI.
                <br>
                <br>
                Para acessar <span style="text-decoration: underline;">à área de Convenios</span> <strong>é necessário inserir um e-mail</strong> previamente cadastrado.
                <br>
                <br>
                <strong>Caso você Coveniado já tenha alterado seu acesso para E-MAIL</strong>, basta inserí-lo e sua <strong>SENHA</strong> para acessar os Laudos.
                <br>
                <br>
                <strong>Caso não tenha alterado o seu LOGIN para um E-MAIL</strong>, siga esse <strong>Exemplo</strong>:
                <br>
                <br>
                Coloque seu <strong>LOGIN</strong> na fentre deste e-mail: 
                <span style="text-decoration: underline;">LOGIN</span><strong> + @exemplo.com</strong> e sua <strong>SENHA</strong>
                para acessar os Laudos vinculados ou cadastrados junto à sua Clínica ou Consultório.
            </h4>
        </div>
        <div class="col-sm-5">
            <h1 class="bg-info"><?= Html::encode($this->title) ?></h1>
            <p>Preencha o campos e-mail e senha para o entar:</p>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?php //-- use email or username field depending on model scenario --// ?>
                <?php if ($model->scenario === 'lwe'): ?>
                    <?= $form->field($model, 'email')->input('email', 
                        ['placeholder' => Yii::t('app', 'Enter your e-mail'), 'autofocus' => true]) ?>
                <?php else: ?>
                    <?= $form->field($model, 'username')->textInput(
                        ['placeholder' => Yii::t('app', 'Enter your username'), 'autofocus' => true]) ?>
                <?php endif ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <!-- <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['agreements/request-password-reset']) ?>.
                    <br>
                    Need new verification email? <?= Html::a('Resend', ['agreements/resend-verification-email']) ?>
                </div> -->
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
