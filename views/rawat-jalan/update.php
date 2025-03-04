<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RawatJalan $model */

$this->title = 'Update Rawat Jalan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rawat Jalans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rawat-jalan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsProgram' => $modelsProgram,
    ]) ?>

</div>
