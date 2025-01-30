<?php
use yii\helpers\Html;

/* @var $id array */

?>
<!DOCTYPE html>
<html>
<head>
    <title>Lembar Formulir Rawat Jalan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }
        h3 {
            text-align: center;
        }
        #ttd{
            text-align: center;
        }
        #biodata{
            position: relative;
            top: 40px;
            right:0px;
            width: 300px;
        }
    </style>
</head>
<body>
    <div id="biodata">
        <p>Nama Lengkap: <strong><?= Html::encode($model->pasien->nama_pasien) ?></strong></p>
        <p>Tanggal Lahir: <strong><?= Html::encode($model->pasien->tgl_lahir) ?></strong></p>
        <p>No. Rekam Medis: <strong><?= Html::encode($model->pasien->no_rekam_medis) ?></strong></p>
    </div> 
    <h3>Lembar Formulir Rawat Jalan <br>
        Layanan Kedokteran Fisik dan Rehabilitas
    </h3>
    
    <p><strong>Tanggal Pelayanan:</strong> <?= Html::encode($model->tgl_pelayanan) ?></p>
    <p><strong>Anamnesis:</strong> <?= Html::encode($model->anamnesis) ?></p>
    <p><strong>Pemeriksaan Tindakan Uji Fungsi:</strong> <?= Html::encode($model->tindakan_uji_fungsi) ?></p>
    <p><strong>Diagnosis Medis (ICD-10):</strong> <?= Html::encode($model->diagnosis_medis) ?></p>
    <p><strong>Diagnosis Fungsi (ICD-10):</strong> <?= Html::encode($model->diagnosis_fungsi) ?></p>
    <p><strong>Pemeriksaan Penunjang:</strong> <?= Html::encode($model->pemeriksaan_penunjang) ?></p>
    <p><strong>Tata Laksana KFR (ICD-9 CM):</strong> <?= Html::encode($model->tata_laksana_kfr) ?></p>
    <p><strong>Anjuran:</strong> <?= Html::encode($model->anjuran) ?></p>
    <p><strong>Evaluasi:</strong> <?= Html::encode($model->evaluasi) ?></p>
    <p><strong>Suspek Penyakit Akibat Kerja:</strong> <?= Html::encode($model->suspek_akibat_kerja) ?></p>
    <p><strong>Perminataan Terapi:</strong> <?= Html::encode($model->permintaan_terapi) ?></p>

    <h4>Program</h4>
    <table>
        <thead>
            <tr>
                <th rowspan="2">Program</th>
                <th rowspan="2">Tanggal</th>
                <th id="ttd" colspan="3">Tanda Tangan</th>
            </tr>
            <tr>
                <th>Pasien</th>
                <th>Dokter</th>
                <th>Fisioterapis</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($modelsProgram as $program): ?>
                <tr>
                    <td><?= Html::encode($program->program) ?></td>
                    <td><?= Html::encode($program->tgl_program) ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
