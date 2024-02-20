<?php

namespace app\entity;

use app\repository\UserRepository;
use yii\web\IdentityInterface;


/**
 *@property int id Идентификатор;
 *@property string email Email;
 * @property string password Пароль;
 * @property boolean is_admin флаг админа;
 */

class Users extends \yii\db\ActiveRecord implements IdentityInterface
{

    public static function tableName()
    {
        return 'user';
    }

    public static function findIdentity($id)
    {
        return UserRepository::getUserById($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {

    }

    public function validateAuthKey($authKey)
    {

    }
    public function validatePassword($password)
    {
        return password_verify($password, $this->password);
    }
}