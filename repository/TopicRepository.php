<?php

namespace app\repository;
use app\entity\Topic;

class TopicRepository
{
    public static function getTopic($Subsection_id){
        return Topic::find()->where(['subsection_id' => $Subsection_id])->all();
    }
    public static function createTopic($name,$subsections_id,$user_id){
        $section = new Topic();
        $section -> name = $name;
        $section -> subsection_id = $subsections_id;
        $section -> user_id = $user_id;

        $section ->save();
        return $section->id;
    }

}