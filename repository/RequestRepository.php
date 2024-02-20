<?php

namespace app\repository;

use app\entity\Request;

class RequestRepository
{
    public static function getRequestById($id){
        return Request::find()->where(['id' => $id])->one();
    }

    public static function getRequests(){
        return Request::find()
            ->asArray()
            ->joinWith('user')
            ->all();
    }
}