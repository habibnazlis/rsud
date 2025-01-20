<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $id
 * @property string $no_rekam_medis
 * @property string|null $no_identitas
 * @property string|null $jenis_identitas
 * @property string|null $nama_pasien
 * @property string|null $tempat_lahir
 * @property string|null $tgl_lahir
 * @property int|null $umur
 * @property string|null $jenis_kelamin
 * @property string|null $agama
 * @property string|null $pendidikan
 * @property string|null $pekerjaan
 * @property string|null $kewarganegaraan
 * @property string|null $no_telp
 * @property string|null $alamat
 * @property string|null $provinsi
 * @property string|null $kabupaten
 * @property string|null $kecamatan
 * @property string|null $kelurahan
 * @property string|null $marital_status
 * @property string|null $nama_ayah
 * @property string|null $nama_ibu
 * @property string|null $riwayat_penyakit
 * @property string|null $nama_penanggung
 * @property string|null $no_kartu
 * @property string|null $berkas
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_rekam_medis', 'nama_pasien', 'jenis_kelamin', 'tgl_lahir'], 'required'],
            [['tgl_lahir'], 'safe'],
            [['umur'], 'integer'],
            [['alamat', 'riwayat_penyakit', 'jenis_identitas'], 'string'],
            [['no_rekam_medis', 'no_identitas', 'nama_pasien', 'tempat_lahir', 'agama', 'pendidikan', 'pekerjaan', 'kewarganegaraan', 'no_telp', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'marital_status', 'nama_ayah', 'nama_ibu', 'nama_penanggung', 'no_kartu'], 'string', 'max' => 255],
            [['berkas'], 'file', 'extensions' => 'png, jpg, pdf, docx'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_rekam_medis' => 'No Rekam Medis',
            'no_identitas' => 'No Identitas',
            'jenis_identitas' => 'Jenis Identitas',
            'nama_pasien' => 'Nama Pasien',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'umur' => 'Umur',
            'jenis_kelamin' => 'Jenis Kelamin',
            'agama' => 'Agama',
            'pendidikan' => 'Pendidikan',
            'pekerjaan' => 'Pekerjaan',
            'kewarganegaraan' => 'Kewarganegaraan',
            'no_telp' => 'No Telp',
            'alamat' => 'Alamat',
            'provinsi' => 'Provinsi',
            'kabupaten' => 'Kabupaten',
            'kecamatan' => 'Kecamatan',
            'kelurahan' => 'Kelurahan',
            'marital_status' => 'Marital Status',
            'nama_ayah' => 'Nama Ayah',
            'nama_ibu' => 'Nama Ibu',
            'riwayat_penyakit' => 'Riwayat Penyakit',
            'nama_penanggung' => 'Nama Penanggung',
            'no_kartu' => 'No Kartu',
            'berkas' => 'Berkas',
        ];
    }
}
