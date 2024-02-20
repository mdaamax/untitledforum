<?php

namespace app\models;

use app\repository\UserRepository;

class RegistrationForm extends \yii\base\Model
{
    public $password;
    public $email;
    public $passwordRepeat;
    public function rules()
    {
        return [
            [['email','password','passwordRepeat'], 'required'],
            ['email', 'email'],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password']
        ];
    }
    public function validateEmail($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = UserRepository::getUserByEmail($this->email);
            if ($user) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }
}