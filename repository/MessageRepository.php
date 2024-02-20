<?php

namespace app\repository;

use app\entity\Messages;
class MessageRepository
{
    public static function getMessage($Topic_id){
        return Messages::find()->joinWith('user')->where(['topic_id' => $Topic_id])->all();
    }

    public static function createMessage($content,$topic_id,$user_id){
        $section = new Messages();
        $section -> content = $content;
        $section -> topic_id = $topic_id;
        $section -> user_id = $user_id;

        $section ->save();
        return $section->id;
    }

}