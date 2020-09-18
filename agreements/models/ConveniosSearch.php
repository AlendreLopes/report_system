<?php

namespace agreements\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use agreements\models\Convenios;

/**
 * ConveniosSearch represents the model behind the search form of `agreements\models\Convenios`.
 */
class ConveniosSearch extends Convenios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_by'], 'integer'],
            [['email', 'senha', 'password_hash', 'password_reset_token', 'account_activation_token', 'auth_key', 'titulo', 'username', 'telefone', 'celular', 'cep', 'endereco', 'endereco_numero', 'endereco_complemento', 'bairro', 'cidade', 'uf', 'data_cadastro'], 'safe'],
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
        $query = Convenios::find();

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
            'status' => $this->status,
            'data_cadastro' => $this->data_cadastro,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'senha', $this->senha])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'account_activation_token', $this->account_activation_token])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'telefone', $this->telefone])
            ->andFilterWhere(['like', 'celular', $this->celular])
            ->andFilterWhere(['like', 'cep', $this->cep])
            ->andFilterWhere(['like', 'endereco', $this->endereco])
            ->andFilterWhere(['like', 'endereco_numero', $this->endereco_numero])
            ->andFilterWhere(['like', 'endereco_complemento', $this->endereco_complemento])
            ->andFilterWhere(['like', 'bairro', $this->bairro])
            ->andFilterWhere(['like', 'cidade', $this->cidade])
            ->andFilterWhere(['like', 'uf', $this->uf]);

        return $dataProvider;
    }
}
