<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\RawatJalan $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rawat Jalans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rawat-jalan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pasien_id',
            'tgl_pelayanan',
            'anamnesis:ntext',
            'tindakan_uji_fungsi:ntext',
            'diagnosis_medis:ntext',
            'diagnosis_fungsi:ntext',
            'pemeriksaan_penunjang:ntext',
            'tata_laksana_kfr:ntext',
            'anjuran:ntext',
            'evaluasi:ntext',
            'suspek_akibat_kerja',
            'permintaan_terapi:ntext',
        ],
    ]) ?>

</div>
