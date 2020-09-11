<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\LaudosApNecropsia;

/**
 * LaudosApNecropsiaSearch represents the model behind the search form of `backend\models\LaudosApNecropsia`.
 */
class LaudosApNecropsiaSearch extends LaudosApNecropsia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'protocolos_id'], 'integer'],
            [['amostra', 'exame', 'conclusao', 'concluido'], 'safe'],
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
        $query = LaudosApNecropsia::find()->orderBy(['id' => SORT_DESC]);

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
            'protocolos_id' => $this->protocolos_id,
            'concluido' => $this->concluido,
        ]);

        $query->andFilterWhere(['like', 'amostra', $this->amostra])
            ->andFilterWhere(['like', 'exame', $this->exame])
            ->andFilterWhere(['like', 'conclusao', $this->conclusao]);

        return $dataProvider;
    }
}
