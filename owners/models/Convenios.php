<?php

namespace owners\models;

use Yii;
use common\models\User;

use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\AttributesBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "convenios".
 *
 * @property int $id
 * @property int $user_id
 * @property string $titulo
 * @property string $username
 * @property string $email
 * @property string $telefone
 * @property string $celular
 * @property string $login
 * @property string $login_hash
 * @property string $senha
 * @property string $senha_hash
 * @property string $cep
 * @property string $endereco
 * @property string $endereco_n
 * @property string $endereco_complemento
 * @property string $bairro
 * @property string $cidade
 * @property string $uf
 * @property string $cadastrada
 * @property string|null $password_hash
 * @property string|null $password_reset_token
 * @property string|null $account_activation_token
 * @property string|null $auth_key
 * @property int|null $status
 *
 * @property User $user
 */
class Convenios extends \yii\db\ActiveRecord
{
    const SCENARIO_DEFAULT = 'default';
    const SCENARIO_CREATE  = 'create';
    const SCENARIO_UPDATE  = 'update';
    public $emailConfirmar;
    public $telefoneConfirmar;
    public $celularConfirmar;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'convenios';
    }
    // Insere usuário data de cadastro
    public function behaviors()
    {
        return [
            [
                'class' => AttributesBehavior::className(),
                'attributes' => [
                    'data_cadastro' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => new Expression('NOW()'),
                    ],
                ],
            ],
            [
                'class' => BlameableBehavior::className(), 
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_by'
                ],
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by', 'status'], 'integer'],
            [['titulo', 'username', 'email', 'emailConfirmar', 'senha', 'celular', 'celularConfirmar'], 'required'],
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
            [['cep'], 'string', 'max' => 15],
            [['titulo','endereco', 'endereco_complemento', 'bairro', 'cidade'], 'string', 'max' => 150],
            [['endereco_numero'], 'string', 'max' => 50],
            [['uf'], 'string', 'max' => 2],
            [['senha'], 'string', 'max' => 20],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => ['titulo', 'username', 'email', 'emailConfirmar', 'senha'],
            self::SCENARIO_CREATE  => ['titulo', 'username', 'email', 'emailConfirmar', 'senha'],
            self::SCENARIO_UPDATE  => ['titulo', 'username', 'email', 'emailConfirmar'],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_by' => 'Usuário',
            'titulo' => 'Titulo',
            'username' => 'Proprietário',
            'email' => 'Email',
            'telefone' => 'Telefone',
            'celular' => 'Celular',
            'senha' => 'Senha',
            'cep' => 'Cep',
            'endereco' => 'Endereco',
            'endereco_numero' => 'Número',
            'endereco_complemento' => 'Complemento',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'uf' => 'Uf',
            'data_cadastro' => 'data_cadastro',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'account_activation_token' => 'Account Activation Token',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProtocolos()
    {
        return $this->hasOne(Protocolos::className(), ['convenio_id' => 'id']);
    }
}
