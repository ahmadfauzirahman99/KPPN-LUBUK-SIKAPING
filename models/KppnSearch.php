<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kppn;

/**
 * KppnSearch represents the model behind the search form of `app\models\Kppn`.
 */
class KppnSearch extends Kppn
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kppn'], 'integer'],
            [['nama_kppn', 'no_staker', 'address', 'phone', 'provinsi', 'kepala_kantor', 'created'], 'safe'],
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
        $query = Kppn::find();

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
            'id_kppn' => $this->id_kppn,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'nama_kppn', $this->nama_kppn])
            ->andFilterWhere(['like', 'no_staker', $this->no_staker])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'provinsi', $this->provinsi])
            ->andFilterWhere(['like', 'kepala_kantor', $this->kepala_kantor]);

        return $dataProvider;
    }
}
