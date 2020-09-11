<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\LaudosApNecropsia;

/**
 * LaudosApCitopatologiaVaginalSearch represents the model behind the search form of `app\modules\laudos\models\LaudosApCitopatologiaVaginal`.
 */
class LaudosApCitopatologiaVaginalSearch extends LaudosApCitopatologiaVaginal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'protocolos_id'], 'integer'],
            [['amostra', 'epiteliais_queratinizadas', 'epiteliais_queratinizadas_n', 'eritrocitos', 'bacterias', 'leucocitos', 'em_branco', 'em_branco_', 'diagnostico', 'concluido'], 'safe'],
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
        $query = LaudosApCitopatologiaVaginal::find();

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
            'user_id' => $this->user_id,
            'protocolos_id' => $this->protocolos_id,
            'concluido' => $this->concluido,
        ]);

        $query->andFilterWhere(['like', 'amostra', $this->amostra])
            ->andFilterWhere(['like', 'epiteliais_queratinizadas', $this->epiteliais_queratinizadas])
            ->andFilterWhere(['like', 'epiteliais_queratinizadas_n', $this->epiteliais_queratinizadas_n])
            ->andFilterWhere(['like', 'eritrocitos', $this->eritrocitos])
            ->andFilterWhere(['like', 'bacterias', $this->bacterias])
            ->andFilterWhere(['like', 'leucocitos', $this->leucocitos])
            ->andFilterWhere(['like', 'em_branco', $this->em_branco])
            ->andFilterWhere(['like', 'em_branco_', $this->em_branco_])
            ->andFilterWhere(['like', 'diagnostico', $this->diagnostico]);

        return $dataProvider;
    }
}
