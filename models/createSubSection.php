<?php

namespace app\models;


class CreateSubSection extends \yii\base\Model
{
    public $name;
    public $section_id;

    public function rules()
    {
        return [
            [['name','section_id'], 'required'],
        ];

    }


}