<?php

namespace agreements\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use agreements\models\Protocolos;

/**
 * ProtocolosSearch represents the model behind the search form of `agreements\models\Protocolos`.
 */
class ProtocolosSearch extends Protocolos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'convenio_id', 'status', 'created_by'], 'integer'],
            [['numero', 'username', 'motedepass', 'password_hash', 'password_reset_token', 'account_activation_token', 'auth_key', 'requisitante', 'proprietario', 'paciente', 'especie', 'especie_raca', 'genero', 'idade', 'contato', 'desconto', 'anestesia', 'isento', 'pago', 'data_cadastro', 'data_expira'], 'safe'],
            [['desconto_valor', 'anestesia_valor', 'valor'], 'number'],
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
        $query = Protocolos::find();

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
            'convenio_id' => $this->convenio_id,
            'status' => $this->status,
            'desconto_valor' => $this->desconto_valor,
            'anestesia_valor' => $this->anestesia_valor,
            'valor' => $this->valor,
            'data_cadastro' => $this->data_cadastro,
            'data_expira' => $this->data_expira,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'numero', $this->numero])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'motedepass', $this->motedepass])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'account_activation_token', $this->account_activation_token])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'requisitante', $this->requisitante])
            ->andFilterWhere(['like', 'proprietario', $this->proprietario])
            ->andFilterWhere(['like', 'paciente', $this->paciente])
            ->andFilterWhere(['like', 'especie', $this->especie])
            ->andFilterWhere(['like', 'especie_raca', $this->especie_raca])
            ->andFilterWhere(['like', 'genero', $this->genero])
            ->andFilterWhere(['like', 'idade', $this->idade])
            ->andFilterWhere(['like', 'contato', $this->contato])
            ->andFilterWhere(['like', 'desconto', $this->desconto])
            ->andFilterWhere(['like', 'anestesia', $this->anestesia])
            ->andFilterWhere(['like', 'isento', $this->isento])
            ->andFilterWhere(['like', 'pago', $this->pago]);

        return $dataProvider;
    }
}
