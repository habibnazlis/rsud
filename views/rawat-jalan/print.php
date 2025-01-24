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
    </style>
</head>
<body>
    <h3>Lembar Formulir Rawat Jalan</h3>
    <p><strong>Nama Lengkap:</strong> <?= Html::encode($model->pasien->nama_pasien) ?></p>
    <p><strong>Tanggal Lahir:</strong> <?= Html::encode($model->pasien->tgl_lahir) ?></p>
    <p><strong>No. Rekam Medis:</strong> <?= Html::encode($model->pasien->no_rekam_medis) ?></p>
    <p><strong>Tanggal Pelayanan:</strong> <?= Html::encode($model->tgl_pelayanan) ?></p>
    <p><strong>Anamnesis:</strong> <?= Html::encode($model->anamnesis) ?></p>
    <p><strong>Pemeriksaan ICD-10:</strong> <?= Html::encode($model->diagnosis_medis) ?></p>
    <p><strong>Diagnosis Fungsi:</strong> <?= Html::encode($model->diagnosis_fungsi) ?></p>
    <h4>Program</h4>
    <table>
        <thead>
            <tr>
                <th>Program</th>
                <th>Tanggal</th>
                <th>Tanda Tangan Pasien</th>
                <th>Tanda Tangan Dokter</th>
                <th>Tanda Tangan Fisioterapis</th>
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
