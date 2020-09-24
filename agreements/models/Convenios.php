<?php

namespace agreements\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "convenios".
 *
 * @property int $id
 * @property string $email
 * @property string $senha
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string|null $account_activation_token
 * @property int $status
 * @property string $auth_key
 * @property string $titulo
 * @property string $username
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
    const SCENARIO_DEFAULT = 'default';
    const SCENARIO_EMAIL   = 'email';
    const SCENARIO_UPDATE  = 'update';
    public $emailConfirmar;
    public $senhaConfirmar;
    public $telefoneConfirmar;
    public $celularConfirmar;
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
            [['titulo', 'username', 'email', 'emailConfirmar', 'senha', 'senhaConfirmar', 'celular', 'celularConfirmar', 'telefone', 'telefoneConfirmar', 'cep', 'endereco', 'endereco_numero', 'endereco_complemento', 'bairro', 'cidade', 'uf'], 'required'],
            [['data_cadastro'], 'safe'],
            [['status', 'created_by'], 'integer'],
            [['data_cadastro'], 'safe'],
            // Proprietario => Username
            ['username', 'string', 'max' => 255],
            ['username', 'match',  'not' => true,
                // we do not want to allow users to pick one of spam/bad usernames 
                'pattern' => '/\b('.Yii::$app->params['user.spamNames'].')\b/i',
                'message' => Yii::t('app', 'It\'s impossible to have that username.')],          
            ['username', 'unique', 
                'message' => Yii::t('app', 'This username has already been taken.')],
            // Email
            [['email', 'password_hash', 'password_reset_token', 'account_activation_token', 'auth_key'], 'string', 'max' => 255],
            //
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 
                'message' => Yii::t('app', 'This email address has already been taken.')],
            [['email', 'emailConfirmar'], 'string', 'max' => 255, 'message' => 'Máximo de 150 caracteres'],
            [['emailConfirmar'], 'compare', 'compareAttribute' => 'email', 'message' => 'E-mails diferentes'],
            //
            [['telefone', 'celular'], 'string', 'max' => 17],
            [['telefone', 'telefoneConfirmar'], 'string', 'max' => 17, 'message' => 'Máximo de 17 caracteres'],
            [['telefoneConfirmar'], 'compare', 'compareAttribute' => 'telefone', 'message' => 'Telefones diferentes'],
            [['celular', 'celularConfirmar'], 'string', 'max' => 17, 'message' => 'Máximo de 17 caracteres'],
            [['celularConfirmar'], 'compare', 'compareAttribute' => 'celular', 'message' => 'Celulars diferentes'],
            //
            [['senha', 'senhaConfirmar'], 'string', 'min' => 6, 'max' => 20, 'message' => 'Senha entre 6 à 20 caracteres'],
            [['senhaConfirmar'], 'compare', 'compareAttribute' => 'senha', 'message' => 'As senhas são diferentes'],
            [['titulo', 'username', 'endereco', 'endereco_complemento', 'bairro', 'cidade'], 'string', 'max' => 150],
            [['telefone', 'celular'], 'string', 'max' => 17],
            [['cep'], 'string', 'max' => 15],
            [['endereco_numero'], 'string', 'max' => 50],
            [['uf'], 'string', 'max' => 2],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => ['titulo', 'username', 'email', 'emailConfirmar', 'senha', 'senhaConfirmar', 'celular', 'celularConfirmar', 'telefone', 'telefoneConfirmar', 'cep', 'endereco', 'endereco_numero', 'endereco_complemento', 'bairro', 'cidade', 'uf'],
            self::SCENARIO_EMAIL  => ['email', 'emailConfirmar', 'senha', 'senhaConfirmar'],
            self::SCENARIO_UPDATE  => ['titulo', 'username', 'celular', 'celularConfirmar', 'cep', 'endereco', 'endereco_numero', 'bairro', 'cidade', 'uf'],
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
            'titulo' => 'Clínica/Consultório',
            'username' => 'Proprietário',
            'telefone' => 'Telefone',
            'celular' => 'Celular',
            'cep' => 'Cep',
            'endereco' => 'Endereço',
            'endereco_numero' => 'Número',
            'endereco_complemento' => 'Complemento',
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
