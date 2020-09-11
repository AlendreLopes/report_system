<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
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

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['agreements/request-password-reset']) ?>.
                    <br>
                    Need new verification email? <?= Html::a('Resend', ['agreements/resend-verification-email']) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
