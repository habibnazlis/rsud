<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pasien $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pasien', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pasien-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (Yii::$app->user->identity->isAdmin()): ?>
            <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php endif; ?>
        <!-- <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?> -->
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'no_rekam_medis',
            'no_identitas',
            'jenis_identitas',
            'nama_pasien',
            'tempat_lahir',
            'tgl_lahir',
            'umur',
            'jenis_kelamin',
            'agama',
            'pendidikan',
            'pekerjaan',
            'kewarganegaraan',
            'no_telp',
            'alamat:ntext',
            'provinsi',
            'kabupaten',
            'kecamatan',
            'kelurahan',
            'marital_status',
            'nama_ayah',
            'nama_ibu',
            'riwayat_penyakit:ntext',
            'nama_penanggung',
            'no_kartu',
            'berkas',
        ],
    ]) ?>

</div>
