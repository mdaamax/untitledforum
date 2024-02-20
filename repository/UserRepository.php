<?php

namespace app\repository;

use app\entity\Users;

class UserRepository
{
    public static function getUserById($id){
        return Users::find()->where(['id' => $id])->one();
    }

    public static function createUser($email, $password, $is_admin = false){
        $user = new Users();
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->is_admin = $is_admin;
        $user->save();
        return $user->id;
    }

    public static function deleteUserById($id){
        return Users::deleteAll(['id' => $id]);
    }

    public static function updateUser($id, $email, $password){
        $user = Users::find()->where(['id' => $id])->one();
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->save();
        return $user->id;
    }
    public static function getUserByEmail($email){
        return Users::find()->where(['email' => $email])->one();
    }
}