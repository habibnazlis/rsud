<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pasien;

/**
 * PasienSearch represents the model behind the search form of `app\models\Pasien`.
 */
class PasienSearch extends Pasien
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'umur'], 'integer'],
            [['no_rekam_medis', 'no_identitas', 'jenis_identitas', 'nama_pasien', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'agama', 'pendidikan', 'pekerjaan', 'kewarganegaraan', 'no_telp', 'alamat', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'marital_status', 'nama_ayah', 'nama_ibu', 'riwayat_penyakit', 'nama_penanggung', 'no_kartu', 'berkas'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pasien::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tgl_lahir' => $this->tgl_lahir,
            'umur' => $this->umur,
        ]);

        $query->andFilterWhere(['like', 'no_rekam_medis', $this->no_rekam_medis])
            ->andFilterWhere(['like', 'no_identitas', $this->no_identitas])
            ->andFilterWhere(['like', 'jenis_identitas', $this->jenis_identitas])
            ->andFilterWhere(['like', 'nama_pasien', $this->nama_pasien])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'pendidikan', $this->pendidikan])
            ->andFilterWhere(['like', 'pekerjaan', $this->pekerjaan])
            ->andFilterWhere(['like', 'kewarganegaraan', $this->kewarganegaraan])
            ->andFilterWhere(['like', 'no_telp', $this->no_telp])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'provinsi', $this->provinsi])
            ->andFilterWhere(['like', 'kabupaten', $this->kabupaten])
            ->andFilterWhere(['like', 'kecamatan', $this->kecamatan])
            ->andFilterWhere(['like', 'kelurahan', $this->kelurahan])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'nama_ayah', $this->nama_ayah])
            ->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu])
            ->andFilterWhere(['like', 'riwayat_penyakit', $this->riwayat_penyakit])
            ->andFilterWhere(['like', 'nama_penanggung', $this->nama_penanggung])
            ->andFilterWhere(['like', 'no_kartu', $this->no_kartu])
            ->andFilterWhere(['like', 'berkas', $this->berkas]);

        return $dataProvider;
    }
}
