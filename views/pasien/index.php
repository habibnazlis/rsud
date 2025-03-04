<?php

use app\models\Pasien;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PasienSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pasien';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasien-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pasien', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'no_rekam_medis',
            // 'no_identitas',
            // 'jenis_identitas',
            'nama_pasien',
            //'tempat_lahir',
            'tgl_lahir',
            'umur',
            'jenis_kelamin',
            //'agama',
            //'pendidikan',
            //'pekerjaan',
            //'kewarganegaraan',
            'no_telp',
            'alamat:ntext',
            //'provinsi',
            //'kabupaten',
            //'kecamatan',
            //'kelurahan',
            //'marital_status',
            //'nama_ayah',
            //'nama_ibu',
            'riwayat_penyakit:ntext',
            // 'nama_penanggung',
            // 'no_kartu',
            'berkas',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pasien $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
