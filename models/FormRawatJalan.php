<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "form_rawat_jalan".
 *
 * @property int $id
 * @property string|null $nama_lengkap
 * @property string|null $tanggal_lahir
 * @property string|null $no_rekam_medis
 * @property string|null $tanggal_pelayanan
 * @property string|null $anamnesis
 * @property string|null $diagnosis_penyakit
 * @property string|null $diagnosis_fungsi
 * @property string|null $pemeriksaan_penunjang
 * @property string|null $tata_laksana
 * @property string|null $anjuran
 * @property string|null $evaluasi
 * @property int|null $suspek_penyakit_kerja
 * @property string $created_at
 *
 * @property Program[] $programs
 */
class FormRawatJalan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'form_rawat_jalan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_lahir', 'tanggal_pelayanan', 'created_at'], 'safe'],
            [['anamnesis', 'diagnosis_penyakit', 'diagnosis_fungsi', 'pemeriksaan_penunjang', 'tata_laksana', 'anjuran', 'evaluasi'], 'string'],
            [['suspek_penyakit_kerja'], 'integer'],
            [['nama_lengkap'], 'string', 'max' => 255],
            [['no_rekam_medis'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_lengkap' => 'Nama Lengkap',
            'tanggal_lahir' => 'Tanggal Lahir',
            'no_rekam_medis' => 'No Rekam Medis',
            'tanggal_pelayanan' => 'Tanggal Pelayanan',
            'anamnesis' => 'Anamnesis',
            'diagnosis_penyakit' => 'Diagnosis Penyakit',
            'diagnosis_fungsi' => 'Diagnosis Fungsi',
            'pemeriksaan_penunjang' => 'Pemeriksaan Penunjang',
            'tata_laksana' => 'Tata Laksana',
            'anjuran' => 'Anjuran',
            'evaluasi' => 'Evaluasi',
            'suspek_penyakit_kerja' => 'Suspek Penyakit Kerja',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Programs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrograms()
    {
        return $this->hasMany(Program::class, ['form_id' => 'id']);
    }
}
