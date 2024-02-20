<?php

namespace app\repository;

use app\entity\Subsections;

class SubSectionRepository
{
    public static function getSubsection($section_id){
        return Subsections::find()->where(['sections_id' => $section_id])->all();
    }
    public static function createSubSection($name,$sections_id){
        $section = new Subsections();
        $section -> name = $name;
        $section -> sections_id = $sections_id;
        $section ->save();
        return $section->id;
    }

}