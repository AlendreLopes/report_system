<?php
namespace agreements\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $rememberMe = true;
    public $status; // holds the information about user status

    /**
     * @var agreements\models\AgreementsUser
     */
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
            // username and password are required on default scenario
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
            'username' => 'Proprietário',
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
                // if scenario is 'lwe' we use email, otherwise we use username
                $field = ($this->scenario === 'lwe') ? 'email' : 'username' ;
                $this->addError($attribute, 'Incorrect '.$field.' or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        /*
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
        */
        if (!$this->validate()) {
            return false;
        }
        //
        $user = $this->getUser();
        //
        if (!$user) {
            return false;
        }
        // if there is user but his status is inactive, write that in status property so we know for later
        if ($user->status == AgreementsUser::STATUS_INACTIVE) {
            $this->status = $user->status;
            return false;
        }
        //
        return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
    }

    /**
     * Helper method responsible for finding user based on the model scenario.
     * In Login With Email 'lwe' scenario we find user by email, otherwise by username
     * 
     * @return object The found User object.
     */
    private function findUser()
    {
        return AgreementsUser::findByUsername($this->username);
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            if (!($this->scenario === 'lwe')) {
                $this->_user = AgreementsUser::findByUsername($this->username);
            }
            //
            $this->_user = AgreementsUser::findByEmail($this->email);
        }
        return $this->_user;
    }
}
