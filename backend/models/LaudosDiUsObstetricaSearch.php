<?php

namespace backend\models;

use yii\base\Model;
use yii\data\Sort;
use yii\data\ActiveDataProvider;
use backend\models\LaudosDiUsObstetrica;

/**
 * LaudosDiUsObstetricaSearch represents the model behind the search form of `backend\models\LaudosDiUsObstetrica`.
 */
class LaudosDiUsObstetricaSearch extends LaudosDiUsObstetrica
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'protocolos_id'], 'integer'],
            [['descricao', 'concluido'], 'safe'],
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
        $sort = new Sort([
            'attributes' => [
                'id' => [
                    'default' => SORT_DESC,
                ],
            ],
        ]);
        $query = LaudosDiUsObstetrica::find()->orderBy(['id' => SORT_DESC]);

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
            'created_by' => $this->created_by,
            'protocolos_id' => $this->protocolos_id,
            'concluido' => $this->concluido,
        ]);

        $query->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
