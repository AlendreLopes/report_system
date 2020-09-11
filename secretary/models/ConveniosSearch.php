<?php

namespace secretary\models;

use yii\base\Model;
use yii\data\Sort;
use yii\data\ActiveDataProvider;
use secretary\models\Convenios;

/**
 * ConveniosSearch represents the model behind the search form of `app\modules\secretaria\models\Convenios`.
 */
class ConveniosSearch extends Convenios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'status'], 'integer'],
            [['titulo', 'username', 'email', 'telefone', 'celular', 'senha', 'cep', 'endereco', 'endereco_numero', 'endereco_complemento', 'bairro', 'cidade', 'uf', 'data_cadastro', 'password_hash', 'password_reset_token', 'account_activation_token', 'auth_key'], 'safe'],
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
        
        $query = Convenios::find()->orderBy(['id' => SORT_DESC]);

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
            'data_cadastro' => $this->data_cadastro,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'telefone', $this->telefone])
            ->andFilterWhere(['like', 'celular', $this->celular])
            ->andFilterWhere(['like', 'senha', $this->senha])
            ->andFilterWhere(['like', 'cep', $this->cep])
            ->andFilterWhere(['like', 'endereco', $this->endereco])
            ->andFilterWhere(['like', 'endereco_numero', $this->endereco_numero])
            ->andFilterWhere(['like', 'endereco_complemento', $this->endereco_complemento])
            ->andFilterWhere(['like', 'bairro', $this->bairro])
            ->andFilterWhere(['like', 'cidade', $this->cidade])
            ->andFilterWhere(['like', 'uf', $this->uf])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key]);

        return $dataProvider;
    }
}
