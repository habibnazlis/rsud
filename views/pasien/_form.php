<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Pasien $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="pasien-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'], // Untuk upload file
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'no_rekam_medis')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'no_identitas')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'jenis_identitas')->dropDownList(['KTP' => 'KTP', 'SIM' => 'SIM', 'Paspor' => 'Paspor'], ['prompt' => 'Pilih Jenis Identitas']) ?>
            <?= $form->field($model, 'nama_pasien')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'tgl_lahir')->input('date') ?>
            <?= $form->field($model, 'umur')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'jenis_kelamin')->radioList(['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan']) ?>
            <?= $form->field($model, 'agama')->dropDownList(['Islam' => 'Islam', 'Kristen' => 'Kristen', 'Hindu' => 'Hindu', 'Buddha' => 'Buddha'], ['prompt' => 'Pilih Agama']) ?>
            <?= $form->field($model, 'pendidikan')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'kewarganegaraan')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'no_telp')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'alamat')->textarea(['rows' => 3]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'provinsi')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'kabupaten')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'kecamatan')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'kelurahan')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'marital_status')->dropDownList(['Belum menikah' => 'Belum menikah', 'Menikah' => 'Menikah'], ['prompt' => 'Pilih Status']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'riwayat_penyakit')->textarea(['rows' => 2]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nama_ayah')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nama_penanggung')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'no_kartu')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'berkas')->fileInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Simpan Biodata Pasien', ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton('Reset Biodata Pasien', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
