<?php

namespace app\models;


class CreateTopic extends \yii\base\Model
{
    public $name;
    public $subsection_id;

    public function rules()
    {
        return [
            [['name','subsection_id'], 'required'],
        ];

    }


}