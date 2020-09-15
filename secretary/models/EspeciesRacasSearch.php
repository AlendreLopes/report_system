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
            [['id'], 'integer'],
            [['especie_id', 'titulo'], 'safe'],
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
        $query->join('LEFT JOIN', 'especies', 'especies.id = especies_racas.especie_id');
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
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
        ->andFilterWhere(['like', 'especies.titulo', $this->especie_id]);

        return $dataProvider;
    }
}
