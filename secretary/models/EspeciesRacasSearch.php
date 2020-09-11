<?php

namespace secretary\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use secretary\models\EspeciesRacas;

/**
 * EspeciesRacasSearch represents the model behind the search form of `secretary\models\EspeciesRacas`.
 */
class EspeciesRacasSearch extends EspeciesRacas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'especie_id'], 'integer'],
            [['titulo'], 'safe'],
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
        $query = EspeciesRacas::find();

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
            'created_by' => $this->user_id,
            'especie_id' => $this->especie_id,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo]);

        return $dataProvider;
    }
}