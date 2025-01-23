<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RawatJalan $model */

$this->title = 'Create Rawat Jalan';
$this->params['breadcrumbs'][] = ['label' => 'Rawat Jalans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rawat-jalan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsProgram' => $modelsProgram,
    ]) ?>

</div>
