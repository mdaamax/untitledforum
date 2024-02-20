<?php

namespace app\models;


class CreateMessage extends \yii\base\Model
{
    public $content;
    public $topic_id;

    public function rules()
    {
        return [
            [['content','topic_id'], 'required'],
        ];

    }


}