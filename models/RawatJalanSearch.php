<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RawatJalan;

/**
 * RawatJalanSearch represents the model behind the search form of `app\models\RawatJalan`.
 */
class RawatJalanSearch extends RawatJalan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pasien_id'], 'integer'],
            [['tgl_pelayanan', 'anamnesis', 'tindakan_uji_fungsi', 'diagnosis_medis', 'diagnosis_fungsi', 'pemeriksaan_penunjang', 'tata_laksana_kfr', 'anjuran', 'evaluasi', 'suspek_akibat_kerja', 'permintaan_terapi'], 'safe'],
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
        $query = RawatJalan::find();

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
            'pasien_id' => $this->pasien_id,
            'tgl_pelayanan' => $this->tgl_pelayanan,
        ]);

        $query->andFilterWhere(['like', 'anamnesis', $this->anamnesis])
            ->andFilterWhere(['like', 'tindakan_uji_fungsi', $this->tindakan_uji_fungsi])
            ->andFilterWhere(['like', 'diagnosis_medis', $this->diagnosis_medis])
            ->andFilterWhere(['like', 'diagnosis_fungsi', $this->diagnosis_fungsi])
            ->andFilterWhere(['like', 'pemeriksaan_penunjang', $this->pemeriksaan_penunjang])
            ->andFilterWhere(['like', 'tata_laksana_kfr', $this->tata_laksana_kfr])
            ->andFilterWhere(['like', 'anjuran', $this->anjuran])
            ->andFilterWhere(['like', 'evaluasi', $this->evaluasi])
            ->andFilterWhere(['like', 'suspek_akibat_kerja', $this->suspek_akibat_kerja])
            ->andFilterWhere(['like', 'permintaan_terapi', $this->permintaan_terapi]);

        return $dataProvider;
    }
}
