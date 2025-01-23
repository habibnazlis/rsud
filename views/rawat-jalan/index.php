<?php

use app\models\RawatJalan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RawatJalanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Rawat Jalans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rawat-jalan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rawat Jalan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pasien_id',
            'tgl_pelayanan',
            'anamnesis:ntext',
            'tindakan_uji_fungsi:ntext',
            //'diagnosis_medis:ntext',
            //'diagnosis_fungsi:ntext',
            //'pemeriksaan_penunjang:ntext',
            //'tata_laksana_kfr:ntext',
            //'anjuran:ntext',
            //'evaluasi:ntext',
            //'suspek_akibat_kerja',
            //'permintaan_terapi:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RawatJalan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
