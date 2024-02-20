<?php

namespace app\repository;

use app\entity\Sections;

class SectionRepository
{
    public static function getSection(){
        return Sections::find()->all();
    }
    public static function createSection($name){
        $section = new Sections();
        $section -> name = $name;
        $section ->save();
        return $section->id;
    }

}
