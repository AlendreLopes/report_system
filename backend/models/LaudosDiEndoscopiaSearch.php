<?php

namespace backend\models;

use yii\base\Model;
use yii\data\Sort;
use yii\data\ActiveDataProvider;
use backend\models\LaudosDiEndoscopia;

/**
 * LaudosDiEndoscopiaSearch represents the model behind the search form of `backend\models\LaudosDiEndoscopia`.
 */
class LaudosDiEndoscopiaSearch extends LaudosDiEndoscopia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'protocolos_id'], 'integer'],
            [['local', 'comentario', 'interpretacao', 'conclusao', 'concluido'], 'safe'],
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
        
        $query = LaudosDiEndoscopia::find()->orderBy(['id' => SORT_DESC]);

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

        $query->andFilterWhere(['like', 'local', $this->local])
            ->andFilterWhere(['like', 'comentario', $this->comentario])
            ->andFilterWhere(['like', 'interpretacao', $this->interpretacao])
            ->andFilterWhere(['like', 'conclusao', $this->conclusao]);

        return $dataProvider;
    }
}
