<?php
namespace owners\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    //00065139-20
    //jfme_Y56
    public $username;
    public $email;
    public $password;
    public $rememberMe = true;
    public $status; // holds the information about user status

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'email'],
            ['password', 'validatePassword'],
            ['rememberMe', 'boolean'],
            // protocolo and password are required on default scenario
            [['username', 'password'], 'required', 'on' => 'default'],
            // email and password are required on 'lwe' (login with email) scenario
            [['email', 'password'], 'required', 'on' => 'lwe'],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels(){
        return [
            'email' => 'E-mail',
            'password' => 'Senha',
            'username' => 'Protocolo',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                //$this->addError($attribute, 'Incorrect protocolo or password.');
                // if scenario is 'lwe' we use email, otherwise we use protocolo
                $field = ($this->scenario === 'lwe') ? 'E-mail' : 'Protocolo' ;
                $this->addError($attribute, 'Incorrect '.$field.' or Password.');
            }
        }
    }

    /**
     * Logs in a user using the provided protocolo and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = OwnersUser::findByUsername($this->username);
        }

        return $this->_user;
    }
}
