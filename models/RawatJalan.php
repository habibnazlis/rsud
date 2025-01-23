<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rawat_jalan".
 *
 * @property int $id
 * @property int $pasien_id
 * @property string $tgl_pelayanan
 * @property string $anamnesis
 * @property string $tindakan_uji_fungsi
 * @property string $diagnosis_medis
 * @property string $diagnosis_fungsi
 * @property string $pemeriksaan_penunjang
 * @property string $tata_laksana_kfr
 * @property string $anjuran
 * @property string $evaluasi
 * @property string $suspek_akibat_kerja
 * @property string $permintaan_terapi
 *
 * @property Pasien $pasien
 * @property Program[] $programs
 */
class RawatJalan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rawat_jalan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pasien_id', 'tgl_pelayanan', 'anamnesis', 'tindakan_uji_fungsi', 'diagnosis_medis', 'diagnosis_fungsi', 'pemeriksaan_penunjang', 'tata_laksana_kfr', 'anjuran', 'evaluasi', 'suspek_akibat_kerja', 'permintaan_terapi'], 'required'],
            [['pasien_id'], 'integer'],
            [['tgl_pelayanan'], 'safe'],
            [['anamnesis', 'tindakan_uji_fungsi', 'diagnosis_medis', 'diagnosis_fungsi', 'pemeriksaan_penunjang', 'tata_laksana_kfr', 'anjuran', 'evaluasi', 'suspek_akibat_kerja', 'permintaan_terapi'], 'string'],
            [['pasien_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::class, 'targetAttribute' => ['pasien_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pasien_id' => 'Pasien ID',
            'tgl_pelayanan' => 'Tgl Pelayanan',
            'anamnesis' => 'Anamnesis',
            'tindakan_uji_fungsi' => 'Tindakan Uji Fungsi',
            'diagnosis_medis' => 'Diagnosis Medis',
            'diagnosis_fungsi' => 'Diagnosis Fungsi',
            'pemeriksaan_penunjang' => 'Pemeriksaan Penunjang',
            'tata_laksana_kfr' => 'Tata Laksana Kfr',
            'anjuran' => 'Anjuran',
            'evaluasi' => 'Evaluasi',
            'suspek_akibat_kerja' => 'Suspek Akibat Kerja',
            'permintaan_terapi' => 'Permintaan Terapi',
        ];
    }

    /**
     * Gets query for [[Pasien]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::class, ['id' => 'pasien_id']);
    }

    /**
     * Gets query for [[Programs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrograms()
    {
        return $this->hasMany(Program::class, ['rawat_jalan_id' => 'id']);
    }
}
