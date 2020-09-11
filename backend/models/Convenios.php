<?php

namespace backend\models;

use Yii;
use common\models\User;
use backend\models\Protocolos;
/**
 * This is the model class for table "convenios".
 *
 * @property int $id
 * @property string|null $email
 * @property string $senha
 * @property string|null $password_hash
 * @property string|null $password_reset_token
 * @property string|null $account_activation_token
 * @property int|null $status
 * @property string|null $auth_key
 * @property string $titulo
 * @property string $proprietario
 * @property string|null $telefone
 * @property string|null $celular
 * @property string|null $cep
 * @property string|null $endereco
 * @property string|null $endereco_numero
 * @property string|null $endereco_complemento
 * @property string|null $bairro
 * @property string|null $cidade
 * @property string|null $uf
 * @property string $data_cadastro
 * @property int $created_by
 *
 * @property User $createdBy
 */
class Convenios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'convenios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['senha', 'titulo'], 'required'],
            [['status', 'created_by'], 'integer'],
            [['data_cadastro'], 'safe'],
            [['email'], 'string', 'max' => 150],
            [['senha'], 'string', 'max' => 20],
            [['password_hash', 'password_reset_token', 'account_activation_token', 'auth_key'], 'string', 'max' => 255],
            [['titulo', 'proprietario', 'endereco', 'endereco_complemento', 'bairro'], 'string', 'max' => 50],
            [['telefone', 'celular'], 'string', 'max' => 17],
            [['cep'], 'string', 'max' => 15],
            [['endereco_numero'], 'string', 'max' => 10],
            [['cidade'], 'string', 'max' => 100],
            [['uf'], 'string', 'max' => 2],
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
            'email' => 'Email',
            'senha' => 'Senha',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'account_activation_token' => 'Account Activation Token',
            'status' => 'Status',
            'auth_key' => 'Auth Key',
            'titulo' => 'Titulo',
            'username' => 'Proprietário',
            'telefone' => 'Telefone',
            'celular' => 'Celular',
            'cep' => 'Cep',
            'endereco' => 'Endereco',
            'endereco_numero' => 'Endereco Numero',
            'endereco_complemento' => 'Endereco Complemento',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'uf' => 'Uf',
            'data_cadastro' => 'Data Cadastro',
            'created_by' => 'Created By',
        ];
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
}
