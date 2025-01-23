<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RawatJalanSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="rawat-jalan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pasien_id') ?>

    <?= $form->field($model, 'tgl_pelayanan') ?>

    <?= $form->field($model, 'anamnesis') ?>

    <?= $form->field($model, 'tindakan_uji_fungsi') ?>

    <?php // echo $form->field($model, 'diagnosis_medis') ?>

    <?php // echo $form->field($model, 'diagnosis_fungsi') ?>

    <?php // echo $form->field($model, 'pemeriksaan_penunjang') ?>

    <?php // echo $form->field($model, 'tata_laksana_kfr') ?>

    <?php // echo $form->field($model, 'anjuran') ?>

    <?php // echo $form->field($model, 'evaluasi') ?>

    <?php // echo $form->field($model, 'suspek_akibat_kerja') ?>

    <?php // echo $form->field($model, 'permintaan_terapi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
