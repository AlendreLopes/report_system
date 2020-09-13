<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Protocolos;

/**
 * ProtocolosSearch represents the model behind the search form of `backend\models\Protocolos`.
 */
class ProtocolosSearch extends Protocolos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_by'], 'integer'],
            [['convenio_id', 'numero', 'username', 'motedepass', 'password_hash', 'password_reset_token', 'account_activation_token', 'auth_key', 'requisitante', 'proprietario', 'paciente', 'especie', 'especie_raca', 'genero', 'idade', 'contato', 'desconto', 'anestesia', 'isento', 'pago', 'data_cadastro', 'data_expira'], 'safe'],
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
        $query = Protocolos::find()
        ->select([
            'protocolos.id','protocolos.convenio_id','protocolos.username',
            'protocolos.requisitante','protocolos.paciente','protocolos.idade',
            'protocolos.especie','protocolos.especie_raca','protocolos.data_cadastro'
        ])
        ->orderBy(['protocolos.id' => SORT_DESC]);

        // add conditions that should always apply here
        $query->join('LEFT JOIN','convenios','convenios.id = protocolos.convenio_id');
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
            //'id' => $this->id,
            //'status' => $this->status,
            //'desconto_valor' => $this->desconto_valor,
            //'anestesia_valor' => $this->anestesia_valor,
            //'valor' => $this->valor,
            'data_cadastro' => $this->data_cadastro,
            //'data_expira' => $this->data_expira,
        ]);

        $query->andFilterWhere(['like', 'protocolos.numero', $this->numero])
            ->andFilterWhere(['like', 'protocolos.username', $this->username])
            ->andFilterWhere(['like', 'protocolos.motedepass', $this->motedepass])
            ->andFilterWhere(['like', 'protocolos.requisitante', $this->requisitante])
            ->andFilterWhere(['like', 'protocolos.proprietario', $this->proprietario])
            ->andFilterWhere(['like', 'protocolos.paciente', $this->paciente])
            ->andFilterWhere(['like', 'protocolos.especie', $this->especie])
            ->andFilterWhere(['like', 'protocolos.especie_raca', $this->especie_raca])
            ->andFilterWhere(['like', 'protocolos.genero', $this->genero])
            ->andFilterWhere(['like', 'protocolos.idade', $this->idade])
            //->andFilterWhere(['like', 'protocolos.contato', $this->contato])
            //->andFilterWhere(['like', 'protocolos.desconto', $this->desconto])
            //->andFilterWhere(['like', 'protocolos.anestesia', $this->anestesia])
            //->andFilterWhere(['like', 'protocolos.isento', $this->isento])
            //->andFilterWhere(['like', 'protocolos.pago', $this->pago])
            ->andFilterWhere(['like', 'protocolos.created_by', $this->created_by])
            ->andFilterWhere(['like', 'protocolos.convenios.username', $this->convenio_id]);
        return $dataProvider;
    }
}
