<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\secretaria\models\Especies */

$this->title = 'Cadastar Especie';
$this->params['breadcrumbs'][] = ['label' => 'Protocolos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Especies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="especies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>