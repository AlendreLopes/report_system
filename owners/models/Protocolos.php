<?php

namespace owners\models;

use Yii;
use common\models\User;
use backend\models\LaudosApCitopatologia;
use backend\models\LaudosApCitopatologiaVaginal;
use backend\models\LaudosApHistopatologia;
use backend\models\LaudosApNecropsia;
use backend\models\LaudosDiEndoscopia;
use backend\models\LaudosDiRaioX;
use backend\models\LaudosDiRaioXContrastado;
use backend\models\LaudosDiUsAparelhoFeminino;
use backend\models\LaudosDiUsEstrutura;
use backend\models\LaudosDiUsExploratoria;
use backend\models\LaudosDiUsGestacional;
use backend\models\LaudosDiUsObstetrica;
use backend\models\LaudosDiUsPosParto;
/**
 * This is the model class for table "protocolos".
 *
 * @property int $id    margin-left: 20px;
 * @property int $convenio_id
 * @property string $numero Proximo Protocolo
 * @property string $username
 * @property string $motedepass
 * @property string|null $password_hash
 * @property string|null $password_reset_token
 * @property string|null $account_activation_token
 * @property int|null $status
 * @property string|null $auth_key
 * @property string $requisitante
 * @property string $proprietario
 * @property string $paciente
 * @property string $especie
 * @property string $especie_raca
 * @property string $genero
 * @property string $idade
 * @property string|null $contato
 * @property string|null $desconto Porcentagem do Desconto
 * @property float|null $desconto_valor Valor do Desconto
 * @property string|null $anestesia Protocolo com Anestesia
 * @property float|null $anestesia_valor Valor da Anestesia
 * @property string|null $isento Protocolo Isento
 * @property string|null $pago Protocolo Pago
 * @property float|null $valor Protocolo Valor
 * @property string $data_cadastro
 * @property string $data_expira
 * @property int $created_by
 *
 * @property LaudosApCitopatologia $laudosApCitopatologia
 * @property LaudosApCitopatologiaVaginal $laudosApCitopatologiaVaginal
 * @property LaudosDiEndoscopia $laudosDiEndoscopia
 * @property LaudosDiRaioX $laudosDiRaioX
 * @property LaudosDiRaioXContrastado[] $laudosDiRaioXContrastados
 * @property LaudosDiUsAparelhoFeminino $laudosDiUsAparelhoFeminino
 * @property LaudosDiUsEstrutura $laudosDiUsEstrutura
 * @property LaudosDiUsExploratoria $laudosDiUsExploratoria
 * @property LaudosDiUsGestacional $laudosDiUsGestacional
 * @property LaudosDiUsObstetrica $laudosDiUsObstetrica
 * @property LaudosDiUsPosParto $laudosDiUsPosParto
 * @property User $createdBy
 * @property ProtocolosLaudosSolicitados[] $protocolosLaudosSolicitados
 */
class Protocolos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'protocolos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['convenio_id', 'username', 'motedepass', 'requisitante', 'proprietario', 'paciente', 'especie', 'especie_raca', 'genero', 'idade', 'created_by'], 'required'],
            [['convenio_id', 'status', 'created_by'], 'integer'],
            [['desconto_valor', 'anestesia_valor', 'valor'], 'number'],
            [['anestesia', 'isento', 'pago'], 'string'],
            [['data_cadastro', 'data_expira'], 'safe'],
            [['numero'], 'string', 'max' => 8],
            [['username'], 'string', 'max' => 11],
            [['motedepass', 'idade'], 'string', 'max' => 20],
            [['password_hash', 'password_reset_token', 'account_activation_token', 'auth_key'], 'string', 'max' => 255],
            [['requisitante', 'proprietario'], 'string', 'max' => 50],
            [['paciente', 'especie_raca'], 'string', 'max' => 60],
            [['especie'], 'string', 'max' => 30],
            [['genero'], 'string', 'max' => 15],
            [['contato'], 'string', 'max' => 17],
            [['desconto'], 'string', 'max' => 3],
            [['username'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'convenio_id' => 'Convenio ID',
            'numero' => 'Numero',
            'username' => 'Protocolo',
            'motedepass' => 'Motedepass',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'account_activation_token' => 'Account Activation Token',
            'status' => 'Status',
            'auth_key' => 'Auth Key',
            'requisitante' => 'Veterinário',
            'proprietario' => 'Tutor',
            'paciente' => 'Paciente',
            'especie' => 'Espécie',
            'especie_raca' => 'Raça',
            'genero' => 'Sexo',
            'idade' => 'Idade',
            'contato' => 'Contato',
            'desconto' => 'Desconto',
            'desconto_valor' => 'Desconto Valor',
            'anestesia' => 'Anestesia',
            'anestesia_valor' => 'Anestesia Valor',
            'isento' => 'Isento',
            'pago' => 'Pago',
            'valor' => 'Valor',
            'data_cadastro' => 'Data Cadastro',
            'data_expira' => 'Data Expira',
            'created_by' => 'Created By',
        ];
    }


    /**
     * Gets query for [[Convenios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConvenios()
    {
        return $this->hasOne(Convenios::className(), ['id' => 'convenio_id']);
    }

    /**
     * Gets query for [[LaudosApCitopatologia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaudosApCitopatologia()
    {
        return $this->hasOne(LaudosApCitopatologia::className(), ['protocolos_id' => 'id']);
    }

    /**
     * Gets query for [[LaudosApCitopatologiaVaginal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaudosApCitopatologiaVaginal()
    {
        return $this->hasOne(LaudosApCitopatologiaVaginal::className(), ['protocolos_id' => 'id']);
    }

    /**
     * Gets query for [[LaudosApHistopatologia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaudosApHistopatologia()
    {
        return $this->hasOne(LaudosApHistopatologia::className(), ['protocolos_id' => 'id']);
    }

    /**
     * Gets query for [[LaudosApNecropsia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaudosApNecropsia()
    {
        return $this->hasOne(LaudosApNecropsia::className(), ['protocolos_id' => 'id']);
    }

    /**
     * Gets query for [[LaudosDiEndoscopia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaudosDiEndoscopia()
    {
        return $this->hasOne(LaudosDiEndoscopia::className(), ['protocolos_id' => 'id']);
    }

    /**
     * Gets query for [[LaudosDiRaioX]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaudosDiRaioX()
    {
        return $this->hasOne(LaudosDiRaioX::className(), ['protocolos_id' => 'id']);
    }

    /**
     * Gets query for [[LaudosDiRaioXContrastados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaudosDiRaioXContrastado()
    {
        return $this->hasOne(LaudosDiRaioXContrastado::className(), ['protocolos_id' => 'id']);
    }

    /**
     * Gets query for [[LaudosDiUsAparelhoFeminino]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaudosDiUsAparelhoFeminino()
    {
        return $this->hasOne(LaudosDiUsAparelhoFeminino::className(), ['protocolos_id' => 'id']);
    }

    /**
     * Gets query for [[LaudosDiUsEstrutura]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaudosDiUsEstrutura()
    {
        return $this->hasOne(LaudosDiUsEstrutura::className(), ['protocolos_id' => 'id']);
    }

    /**
     * Gets query for [[LaudosDiUsExploratoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaudosDiUsExploratoria()
    {
        return $this->hasOne(LaudosDiUsExploratoria::className(), ['protocolos_id' => 'id']);
    }

    /**
     * Gets query for [[LaudosDiUsGestacional]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaudosDiUsGestacional()
    {
        return $this->hasOne(LaudosDiUsGestacional::className(), ['protocolos_id' => 'id']);
    }

    /**
     * Gets query for [[LaudosDiUsObstetrica]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaudosDiUsObstetrica()
    {
        return $this->hasOne(LaudosDiUsObstetrica::className(), ['protocolos_id' => 'id']);
    }

    /**
     * Gets query for [[LaudosDiUsPosParto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaudosDiUsPosParto()
    {
        return $this->hasOne(LaudosDiUsPosParto::className(), ['protocolos_id' => 'id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    
    /**
     * Gets query for [[ProtocolosLaudosSolicitados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProtocolosLaudosSolicitados()
    {
        return $this->hasMany(ProtocolosLaudosSolicitados::className(), ['protocolo_id' => 'id']);
    }
}
